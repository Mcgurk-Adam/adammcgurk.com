const CACHE_NAME = "v8"; // bump
const PRECACHE = [
    "/assets/checkmark.svg",
    "/assets/twitter.svg",
    "/assets/logo.svg",
    "/assets/github.svg",
    "/assets/menu.svg",
    "/assets/devto.svg",
    "/assets/hero.webp",
    "/assets/close.svg",
    "/assets/AdamHeadshot.jpg",
];

const ALLOWLIST = [
    /^https:\/\/fonts\.googleapis\.com\/css2\?/,
    /^https:\/\/fonts\.gstatic\.com\/.*/,
    /^https:\/\/cdn\.usefathom\.com\/script\.js$/,
];

self.addEventListener("install", (event) => {
    event.waitUntil((async () => {
        const c = await caches.open(CACHE_NAME);
        await c.addAll(PRECACHE);
    })());
    self.skipWaiting();
});

self.addEventListener("activate", (event) => {
    event.waitUntil((async () => {
        const keys = await caches.keys();
        await Promise.all(keys.map((k) => k === CACHE_NAME ? undefined : caches.delete(k)));
    })());
    self.clients.claim();
});

self.addEventListener("fetch", (event) => {
    const req = event.request;
    if (req.method !== "GET") return;

    // 1) Documents: never serve from cache; fetch fresh (fallback to cache if offline)
    if (req.mode === "navigate" || req.destination === "document" ||
        req.headers.get("accept")?.includes("text/html")) {
        event.respondWith(networkOnlyWithOfflineFallback(req));
        return;
    }

    const url = new URL(req.url);

    // 2) Same-origin static assets: SWR (fast + keep fresh)
    if (url.origin === self.location.origin && url.pathname.startsWith("/assets/")) {
        event.respondWith(staleWhileRevalidate(req));
        return;
    }

    // 3) Allowed cross-origin (fonts/analytics): SWR
    if (ALLOWLIST.some((rx) => rx.test(req.url))) {
        event.respondWith(staleWhileRevalidate(req));
    }
});

async function networkOnlyWithOfflineFallback(req) {
    try {
        // Respect hard-reload intent
        const res = await fetch(req, { cache: req.cache === "reload" ? "reload" : "no-store" });
        return res; // do NOT cache HTML
    } catch {
        // If offline, return any matching cached copy as a last resort
        const cached = await caches.match(req);
        return cached || new Response("Offline", { status: 503, statusText: "Offline" });
    }
}

async function staleWhileRevalidate(req) {
    const cache = await caches.open(CACHE_NAME);
    const cached = await cache.match(req);
    const networkPromise = (async () => {
        try {
            const netRes = await fetch(req);
            if (netRes && (netRes.ok || netRes.type === "opaque")) {
                await cache.put(req, netRes.clone());
            }
            return netRes;
        } catch { /* swallow */ }
    })();
    return cached || networkPromise || fetch(req);
}
