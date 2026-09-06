# chief4ofakind — Chief of Staff checkpoint

**Title:** `checkpoint/seetoseeportal/ChiefOfStaff-4ofakind`

Proven green POC frozen 2026-09-06 from BoothsOrigins `1FJN*` (+ leave/rejoin on four-seat).

| Folder | Role |
|--------|------|
| `FJNBoothIPv1/` | 2-seat media green |
| `FJNBoothIPv2/` | 4-seat media green + leave/rejoin (STALE=45, leaveBeacon) |

## Bar hit
- 2-seat phone-to-phone connected
- 4-seat: 4 of 4 seats, 3 of 3 media links, all cameras; rejoin same room code works while active

## Product notes
- Four seats = four camera angles + linked lines
- Next: persistent office line + embed package
- Session rooms still ephemeral until persistence ships

## Replace old live booths
1. Backup Hostinger `public_html/FJNBoothIPv1` and `FJNBoothIPv2`
2. Copy these folders over production (or promote from BoothsOrigins `1FJN*`)
3. Smoke: create/join, media, leave/rejoin on four-seat
