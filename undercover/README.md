# Undercover (Mr. White)

A pass-and-play clone of the party game Undercover for one phone. It's a single HTML file with no install, no server and no internet needed (fonts fall back to system fonts offline).

## Install it as an app (PWA)

Served from GitHub Pages at https://j4sgf.github.io/scandi-test/undercover/

- **Android (Chrome):** open the link, then tap menu and pick "Install app" (or "Add to Home screen").
- **iPhone (Safari):** open the link, tap Share, then "Add to Home Screen".

After the first load it works with no internet. When you change a file, bump `VERSION` in `sw.js` so installed copies update.

You can also just open `index.html` straight from your phone's files. That works too, but without the app icon or offline caching.

Players, settings and the scoreboard are saved on the device, so they're still there next time.

## Rules in short

- Civilians share a word. The Undercover gets a similar word and doesn't know they're the odd one out. Mr. White gets no word.
- Each round everyone gives a one-word clue, then the group votes someone out and their role is revealed.
- A voted-out Mr. White gets one guess at the civilians' word, and wins if it's right.
- Civilians win when all infiltrators are out. Infiltrators win if they last until one civilian is left.
- Points: civilians 2 each, Mr. White 6, each surviving Undercover 10.

Word packs: English (146 pairs), Bahasa Indonesia (80 pairs), or type your own pair.
