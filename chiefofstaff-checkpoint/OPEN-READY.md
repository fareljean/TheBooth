# Chief of Staff checkpoint — open-ready

**Branch/title:** `checkpoint/seetoseeportal/ChiefOfStaff-open-ready`

Frozen 2026-09-06 after PrivateBooths doorway wiring + green booth tryout path.

## Live map
| Role | URL | Status at freeze |
|------|-----|------------------|
| Door | https://seetosee.org/PrivateBooths/ | HTTP 200 |
| Choose room | https://seetosee.org/PrivateBooths/portal/portals.html | 2-seat → prod IPv1; 4-seat → Origins 1FJNv2 |
| 2-seat | https://fareljean.com/FJNBoothIPv1/ | create OK (production) |
| 4-seat | https://fareljean.com/BoothsOrigins/1FJNBoothIPv2/ | create OK + leave/rejoin (do not move folder until copy drop understood) |
| 4-seat prod path | https://fareljean.com/FJNBoothIPv2/ | still 404 — intentionally unused |

Portal Enter links at freeze: ['https://fareljean.com/FJNBoothIPv1/', 'https://fareljean.com/BoothsOrigins/1FJNBoothIPv2/']

## Green bar
- Door → Choose room → Enter for both seats
- 2-seat media working on production
- 4-seat media + leave/rejoin on Origins original
- Prefer Safari if Chrome shows Not Secure

## Known next (not blocking open)
Chrome **Not Secure** / mic risk from Let's Encrypt **YE2** chain on `seetosee.org` and `fareljean.com`. Fix after this checkpoint (reissue toward ISRG Root X1 / Cloudflare orange-cloud).

## Related
- `chief4ofakind/` package + TheBooth PR #2
- Skills: seetosee-booth-green-light-path, seetosee-booth-sandbox-maintenance
