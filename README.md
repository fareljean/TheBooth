# TheBooth — comparison workspace

This repository preserves three supplied snapshots of both SeeToSee booths so they can be compared without overwriting one another.

## Recovery target

- Hostinger test path: [fareljean.com/BoothsOrigins](https://fareljean.com/BoothsOrigins/)
- Goal: restore the booths to the original working connection, then add the approved camera/audio improvements without breaking the connection.
- Safety rule: work and test in `/BoothsOrigins/` first. Do not replace the live `/FJNBoothIPv1/` or `/FJNBoothIPv2/` folders until the restored versions are confirmed.

## Version map

| Folder | Supplied source | Meaning |
| --- | --- | --- |
| `original/` | folders beginning with `1` | Original working connection |
| `edited-camera-patch/` | folders beginning with `2` | Audio/camera patch edit |
| `live/` | folders beginning with `3` | Snapshot identified as live |

Each version contains:

- `FJNBoothIPv1/` — two-seat booth
- `FJNBoothIPv2/` — four-seat booth

## Working rule

Treat `original/` as the reference, `edited-camera-patch/` as the proposed change, and `live/` as the current-server snapshot. Compare first. Do not copy a complete folder onto Hostinger until the desired behavior has been identified and tested.

The `live/` label reflects the supplied folder naming; this package does not independently verify the server state.

## Deliberately excluded

- Runtime `booth-data/*.json` and `*.lock` session files
- macOS `.DS_Store`, `._*`, and `__MACOSX` metadata
- The live Cloudflare TURN token configuration

`live/FJNBoothIPv2/turn-config.example.php` documents the required configuration keys. Create `turn-config.php` only on the server and never commit it.
