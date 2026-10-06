# Make a WordPress user an Administrator

Use this when our WordPress login (e.g. web@smartsites.com) can log in but has no Plugins, Appearance, Settings or Users menu. Send it to whoever has admin or hosting access.

## Option A: from the WordPress dashboard (needs an existing Administrator login)
1. Log in to `/wp-admin/` as an Administrator.
2. Go to **Users > All Users** and find the user by username or email.
3. Click **Edit**, set **Role** to **Administrator**, then click **Update User** at the bottom.

## Option B: WP-CLI (needs SSH / hosting access)
1. In the site folder, run:
   `wp user set-role web@smartsites.com administrator`
2. Check it: `wp user get web@smartsites.com --field=roles`. It should print `administrator`.

## Option C: phpMyAdmin (hosting access, no SSH)
1. Open the site database. The table prefix is often `wp_`; check `$table_prefix` in `wp-config.php`.
2. In `wp_users`, find the user's `ID` by `user_email`.
3. In `wp_usermeta`, for that `user_id`:
   - `wp_capabilities` → `a:1:{s:13:"administrator";b:1;}`
   - `wp_user_level` → `10`
   (If the prefix isn't `wp_`, the meta keys change too, e.g. `abc_capabilities`.)

## Verify
- Log out and back in. The left menu should now show Plugins, Appearance, Settings and Users.

## Platform notes
- On WordPress Multisite, only a Super Admin can do this (Network Admin > Users).
- Some hosts (WP Engine, Kinsta, SiteGround) have a "WordPress admin login" or SSO button in their dashboard. That gives an admin login for Option A.

## Seen on
- [blindsanddesignsofflorida.com 10-05-2026](../../Website%20Tracking%20-%20GA4/blindsanddesignsofflorida.com/10-05-2026-log.md)
