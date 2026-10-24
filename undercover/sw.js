// Retired: the game moved to the Game Night hub one folder up.
// This worker clears the old cache, unregisters itself and sends open tabs to the hub.
self.addEventListener("install", () => self.skipWaiting());
self.addEventListener("activate", e => {
  e.waitUntil((async () => {
    await caches.delete("undercover-v1");
    await self.registration.unregister();
    for (const c of await self.clients.matchAll({ type: "window" })) c.navigate("../");
  })());
});
