// sw.js
const CACHE_NAME = "v6";

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

// Allowlisted cross-origin GETs to cache (stale-while-revalidate)
const ALLOWLIST = [
    // Google Fonts CSS + files
    /^https:\/\/fonts\.googleapis\.com\/css2\?/,
    /^https:\/\/fonts\.gstatic\.com\/.*/,

    // Fathom script (NOT beacons)
    /^https:\/\/cdn\.usefathom\.com\/script\.js$/,
];

self.addEventListener("install", (event) => {
    event.waitUntil(caches.open(CACHE_NAME).then((c) => c.addAll(PRECACHE)));
    self.skipWaiting?.();
});

self.addEventListener("activate", (event) => {
    event.waitUntil(
        (async () => {
            const keys = await caches.keys();
            await Promise.all(keys.map((k) => (k === CACHE_NAME ? null : caches.delete(k))));
            self.clients.claim?.();
        })()
    );
});

self.addEventListener("fetch", (event) => {
    const req = event.request;
    if (req.method !== "GET") return;

    const url = new URL(req.url);

    // Same-origin: cache-first
    if (url.origin === self.location.origin) {
        event.respondWith(cacheFirst(req));
        return;
    }

    // Cross-origin: only cache if allowlisted (SWR)
    if (ALLOWLIST.some((rx) => rx.test(req.url))) {
        event.respondWith(staleWhileRevalidate(req));
        return;
    }

    // Everything else: bypass
    // (Let the network/CSP handle it; no respondWith)
});

async function cacheFirst(req) {
    const cached = await caches.match(req);
    if (cached) return cached;

    const res = await fetch(req);
    if (res && res.ok) {
        const cache = await caches.open(CACHE_NAME);
        cache.put(req, res.clone());
    }
    return res;
}

async function staleWhileRevalidate(req) {
    const cached = await caches.match(req);
    const networkPromise = fetch(req)
        .then((res) => {
            if (res && (res.ok || res.type === "opaque")) {
                caches.open(CACHE_NAME).then((c) => c.put(req, res.clone()));
            }
            return res;
        })
        .catch(() => cached || Promise.reject(new Error("offline")));
    // Return cached immediately if present; otherwise wait for network.
    return cached || networkPromise;
}
