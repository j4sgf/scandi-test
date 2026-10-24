# Game Night

Pass-and-play party games for one phone. Enter the players once, then pick a game; everything shares one player list and scoreboard.

- **Undercover (Mr. White):** everyone gets a secret word, a few get a slightly different one, and Mr. White gets nothing. Give clues, vote people out. English and Bahasa Indonesia word packs, or type your own pair.
- **Spyfall:** everyone sees the same location and a role, except the spy. Ask each other questions against the clock, call a vote, or let the spy guess. English (30) and Indonesia (21) location packs.
- **Werewolf:** the phone is the narrator. It speaks each night step out loud (English or Bahasa Indonesia, using the phone's built-in voice) with synthesized sound effects: a howl at nightfall, crickets, a heartbeat while the wolves choose, a morning bell and a thud for each death. Roles: Werewolves, Villagers, Seer, Doctor, Hunter.

## Install it as an app (PWA)

Live at https://j4sgf.github.io/scandi-test/ once GitHub Pages is on (Settings, Pages, deploy from branch `ccr-3d87a831-tkivfz`, folder `/ (root)`).

- **Android (Chrome):** open the link, menu, "Install app".
- **iPhone (Safari):** open the link, Share, "Add to Home Screen".

It works offline after the first load. When you change a file, bump `VERSION` in `sw.js` so installed copies update.

`index.html` also works on its own: download it and open it in any browser, just without the app icon or offline caching.

## Files

- `index.html`: the whole app (hub, both games, styles, word lists)
- `manifest.webmanifest`, `sw.js`, `icon-*.png`, `apple-touch-icon.png`: PWA install and offline support
- `undercover/`: the old address, forwards to the hub
