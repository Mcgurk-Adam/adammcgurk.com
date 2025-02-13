const CACHE_NAME = "v5";
const urlsToCache = [
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

self.addEventListener("install", event => {
    event.waitUntil(
        caches.open(CACHE_NAME)
            .then(cache => {
                return cache.addAll(urlsToCache);
            })
    );
});

self.addEventListener("fetch", event => {
    event.respondWith(
        caches.match(event.request)
            .then(response => {
                    if (response) {
                        return response;
                    }
                    try {
                        return fetch(event.request);
                    } catch (e) {
                        console.log(`Failed with error ${e.message} on file ${event.request.url}`);
                    }
                }
            )
    );
});

self.addEventListener("activate", event => {
    const cacheWhitelist = [CACHE_NAME];
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames.map(cacheName => {
                    if (cacheWhitelist.indexOf(cacheName) === -1) {
                        return caches.delete(cacheName);
                    }
                })
            );
        })
    );
});