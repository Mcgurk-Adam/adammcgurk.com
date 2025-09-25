const CACHE_NAME = "v7";

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
    self.skipWaiting?.();
});

self.addEventListener("activate", (event) => {
    event.waitUntil((async () => {
        const keys = await caches.keys();
        await Promise.all(keys.map((k) => k === CACHE_NAME ? null : caches.delete(k)));
        self.clients.claim?.();
    })());
});

self.addEventListener("fetch", (event) => {
    const req = event.request;
    if (req.method !== "GET") return;

    const url = new URL(req.url);

    if (url.origin === self.location.origin) {
        event.respondWith(cacheFirst(req));
        return;
    }

    if (ALLOWLIST.some((rx) => rx.test(req.url))) {
        event.respondWith(staleWhileRevalidate(req));
        return;
    }
});

async function cacheFirst(req) {
    const cache = await caches.open(CACHE_NAME);
    const hit = await cache.match(req);
    if (hit) return hit;

    const netRes = await fetch(req);
    if (netRes && netRes.ok) {
        const copy = netRes.clone();
        await cache.put(req, copy);
    }
    return netRes;
}

async function staleWhileRevalidate(req) {
    const cache = await caches.open(CACHE_NAME);
    const cached = await cache.match(req);

    const networkPromise = (async () => {
        try {
            const netRes = await fetch(req);
            if (netRes && (netRes.ok || netRes.type === "opaque")) {
                const copy = netRes.clone();
                await cache.put(req, copy);
            }
            return netRes;
        } catch (e) {
            if (cached) return cached;
            throw e;
        }
    })();

    return cached || networkPromise;
}
