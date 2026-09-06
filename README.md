# TheBooth — comparison workspace

This repository preserves three supplied snapshots of both SeeToSee booths so they can be compared without overwriting one another.

## Recovery target

- Hostinger test path: [fareljean.com/BoothsOrigins](https://fareljean.com/BoothsOrigins/)
- Goal: restore the booths to the original working connection, then add the approved camera/audio improvements without breaking the connection.
- Safety rule: work and test in `/BoothsOrigins/` first. Do not replace the live `/FJNBoothIPv1/` or `/FJNBoothIPv2/` folders until the restored versions are confirmed.

## Version map

| Repo folder | Hostinger live path (numbered) | Meaning |
| --- | --- | --- |
| `original/` | [`/BoothsOrigins/1FJNBoothIPv1/`](https://fareljean.com/BoothsOrigins/1FJNBoothIPv1/) · [`…/1FJNBoothIPv2/`](https://fareljean.com/BoothsOrigins/1FJNBoothIPv2/) | Original working connection (“green lights”) |
| `edited-camera-patch/` | `/BoothsOrigins/2FJNBoothIPv1/` · `/BoothsOrigins/2FJNBoothIPv2/` | Audio/camera patch (camera click unlocks remote audio); same `signal.php` as original |
| `live/` | [`/BoothsOrigins/3FJNBoothIPv1/`](https://fareljean.com/BoothsOrigins/3FJNBoothIPv1/) · [`…/3FJNBoothIPv2/`](https://fareljean.com/BoothsOrigins/3FJNBoothIPv2/) | Snapshot of production-style admission build |

Production booths (do not overwrite until sandbox passes):

- https://fareljean.com/FJNBoothIPv1/
- https://fareljean.com/FJNBoothIPv2/

Naming rule: the digit prefix `1` / `2` / `3` on Hostinger maps to original / edited-camera-patch / live in this repo.

Each version contains:

- `FJNBoothIPv1/` — two-seat booth
- `FJNBoothIPv2/` — four-seat booth

## Chief 4-of-a-kind checkpoint

Replace-ready freeze of the proven BoothsOrigins green POC (2+4 seat, leave/rejoin, 4-up media):

- Folder: [`chief4ofakind/`](./chief4ofakind/) — `FJNBoothIPv1/` + `FJNBoothIPv2/`
- Use this to replace old production FJN booth folders via Hostinger File Manager after confirmation.

## Verified on Hostinger (2026-09-06)

- `1FJNBoothIPv*` index hashes match `original/`; `signal.php?action=create` returns **201** without a pass (media path open).
- `3FJNBoothIPv*` index hashes match `live/` (admission UI present). Create may **500** if BoothsOrigins lacks server `.env` / `BOOTH_SECRET` / TURN config — expected until secrets are copied for sandbox only.
- `2FJNBoothIPv*` was not found at probe time — upload the edited pair when ready.

## Working rule

Treat `original/` (`1…`) as the media reference, `edited-camera-patch/` (`2…`) as the proposed UI/audio change, and `live/` (`3…`) as the admission-aware snapshot. Compare first. Do not copy a complete folder onto production `/FJNBoothIPv1|2/` until the desired behavior has been identified and tested in `/BoothsOrigins/`.

Portal product loop (separate from booth media):

- Entrance door: `seetosee.org/portals/`
- Pass mint: Seeme `api/booth/issue-pass.php` + shared `BOOTH_SECRET`
- Cutover: winning BoothsOrigins media + thin pass gate → production FJN paths

## Deliberately excluded

- Runtime `booth-data/*.json` and `*.lock` session files
- macOS `.DS_Store`, `._*`, and `__MACOSX` metadata
- The live Cloudflare TURN token configuration

`live/FJNBoothIPv2/turn-config.example.php` documents the required configuration keys. Create `turn-config.php` / `.env` only on the server and never commit them.
