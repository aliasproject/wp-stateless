=== WP-Stateless - Google Cloud Storage ===
Contributors: usability_dynamics, andypotanin, ideric, maxim.peshkov, planvova, obolgun
Donate link: https://udx.io
Tags: google, google cloud, google cloud storage, cdn, uploads, media, stateless, backup
License: GPLv2 or later
Requires PHP: 8.0
Requires at least: 5.0
Tested up to: 6.4.2
Stable tag: 3.4.0

Upload and serve your WordPress media files from Google Cloud Storage.

== Description ==

Upload and serve your WordPress media from Google Cloud Storage (GCS) with the WP-Stateless plugin. In as little as two minutes, you will be benefitting from serving your media from Google Cloud's distributed servers.

New to Google Cloud? Google is offering you a [$300 credit](https://console.cloud.google.com/freetrial?referralId=e1c28cf728ff49b38d4eb5add3f5bfc8) to get you started.

= Benefits =
* Store and deliver media files on Google Cloud Storage instead of your server.
* Google Cloud Storage is geo-redundant, meaning your media is delivered by the closest server - reducing latency and improving page speed.
* Scale your WordPress website across multiple servers without the need of synchronizing media files.
* Native integration between Google Cloud Storage and WordPress.
* $300 free trial from Google Cloud. Nice!

= Modes =
* Backup - Upload media files to Google Storage and serve local file urls.
* CDN - Copy media files to Google Storage and serve them directly from there.
* Ephemeral - Store and serve media files with Google Cloud Storage only. Media files are not stored locally, but local storage is used temporarily for processing and is required for certain compatibilities.
* Stateless - Store and serve media files with Google Cloud Storage only. Media files are not stored locally.

= Features =
* Setup assistant makes getting started fast and easy.
* No need to manually create service accounts or buckets - handled automatically.
* Settings panel provides you with further GCS configuration and file url customization.
* Mask the default GCS URL with your own custom domain.
* Automatically replace hardcoded media URLs with GCS equivalents in post editor and meta.
* Batch image thumbnail regeneration.
* Synchronization tools for uploading existing files and images.
* All settings supported with wp-config constants and network setting overrides.
* Multiple modes: Backup, CDN, Ephemeral, Stateless.
* All files served in HTTPS mode.
* Serverless platform compatible, including Google App Engine.
* Multisite compatible.

= Support, Feedback, & Contribute =
We welcome community involvement via the [GitHub repository](https://github.com/udx/wp-stateless).

= Custom Development =
Looking for a unique feature for your next project? [Hire us!](https://udx.io/)

== Installation ==

1. Search, install, and activate the *WP-Stateless* plugin via your WordPress dashboard.
2. Begin WP-Stateless setup assistant at *Media > Stateless Setup* and click "Get Started Now."
3. Click "Google Login" and sign-in with your Google account.
4. Set a Google Cloud Project, Google Cloud Storage Bucket, and Google Cloud Billing Account and click "Continue."
5. Installation and setup is now complete. Visit *Media > Stateless Settings* for more options.
For a more detailed installation and setup walkthrough, please see the [manual setup instructions on Github](https://stateless.udx.io/docs/manual-setup/).

== Screenshots ==

1. Settings Panel: Supports network setting and wp-config constant overrides.
2. Setup Assistant
3. Setup Assistant: Google Login
4. Setup Assistant: Approve Permissions
5. Setup Assistant: Project & Bucket
6. Setup Assistant: Complete
7. Edit Media: Image stored on Google Cloud Storage.

== Frequently Asked Questions ==

= What are the minimum server requirements for this plugin? =

Beyond the [official WordPress minimum requirements](https://wordpress.org/about/requirements/), WP-Stateless requires a minimum PHP version of 8.0 or higher and OpenSSL to be enabled.

= What wp-config constants are supported? =

For a complete list of supported wp-config constants, please consult the [GitHub documentation](https://stateless.udx.io/docs/constants/).

= How do I manually generate the Service Account JSON? =

The WP-Stateless setup assistant will create the Service Account JSON automatically for you, but you can follow these steps if you choose to create it manually.

1. Visit Google Cloud Console, and go to *IAM & Admin > Service accounts*.
2. Click *Create Service Account* and name it *wp-stateless*.
3. Set the role to *Storage > Storage Admin*.
4. Check *Furnish a new private key* and select *JSON* as the key type.
5. Open the JSON file and copy the contents into the *Service Account JSON* textarea within the WP-Stateless settings panel.

= Where can I submit feature requests or bug reports? =

We encourage community feedback and discussion through issues on the [GitHub repository](https://github.com/udx/wp-stateless/issues).

= Can I test new features before they are released? =

To ensure new releases cause as little disruption as possible, we rely on a number of early adopters who assist us by testing out new features before they are released. [Please contact us](https://udx.io/) if you are interested in becoming an early adopter.

= Who maintains this plugin? =

[UDX](https://udx.io/) maintains this plugin by continuing development through it's own staff, reviewing pull requests, testing, and steering the overall release schedule. UDX is located in Durham, North Carolina and provides WordPress engineering and hosting services to clients throughout the United States.


== Upgrade Notice ==
= 3.2.3 =
Before upgrading to WP-Stateless 3.2.3, please, make sure you use PHP 8.0 or above.

= 3.2.0 =
Before upgrading to WP-Stateless 3.2.0, please, make sure you use PHP 7.2 or above.

= 3.0 =
Before upgrading to WP-Stateless 3.0, please, make sure you tested it on your development environment.

== Changelog ==
= 3.4.0 =
* ENHANCEMENT - removed `udx/lib-settings` package dependency for security reasons. 
* ENHANCEMENT - removed `udx/lib-utility` package dependency for security reasons.
* ENHANCEMENT - refactored `Settings` admin page to remove Angular dependency.
* ENHANCEMENT - including Software Bill of Materials (SBOM) to GitHub release.
* FIX - updated package dependencies for Google Client Library for security reasons.
* FIX - replaced `utf8_encode` with `mb_convert_encoding` to support PHP 8.2 and above [#678](https://github.com/udx/wp-stateless/issues/678).
* FIX - Fatal Error in `Stateless` mode if GCP access credentials are wrong [#693](https://github.com/udx/wp-stateless/issues/693).
* COMPATIBILITY - preventing PHP warnings while working with WooCommerce version 8.4.0 and above [696](https://github.com/udx/wp-stateless/issues/696).
* COMPATIBILITY - avoiding conflicts between builtin compatibilities and WP-Stateless Addon plugins.

= 3.3.0 =
* NEW - Added new filter `wp_stateless_attachment_url`. Allows to customize attachment URL after WP-Stateless generates it based on it's internal conditions.
* FIX - Stateless mode Incompatible with Media Uploader in Media Library Grid mode [#675](https://github.com/udx/wp-stateless/issues/675).
* FIX - Prevent duplicating messages in Admin Panel.
* COMPATIBILITY - Dynamic Image Support is now part of the core.
* COMPATIBILITY - Google App Engine is now part of the core. Automatically enables **Stateless** mode when Google App Engine detected. Can be disabled using `WP_STATELESS_COMPATIBILITY_GAE` constant.
* COMPATIBILITY - Removed compatibility with "Advanced Custom Fields: Image Crop Add-on", because plugin is deprecated.
* COMPATIBILITY - Removed compatibility with "VidoRev" plugin.
* COMPATIBILITY - Removed compatibility with "WP Retina 2x" plugin.
* ENHANCEMENT - Updated Client library for Google APIs from 2.15.0 to 2.15.1.
* ENHANCEMENT - Updated Meta Box library from 5.6.3 to 5.8.2.
* ENHANCEMENT - Updated Meta Box Tabs to version 1.1.17.
* ENHANCEMENT - Updated PHP JWT library from 6.6.0 to 6.9.0.

= 3.2.5 =
* FIX - Folder setting does not allow custom structure [#608](https://github.com/udx/wp-stateless/issues/608).
* FIX - Stateless mode Incompatible with Inline Uploader [#675](https://github.com/udx/wp-stateless/issues/675).
* FIX - html tags incorrectly applied in notice [#680](https://github.com/udx/wp-stateless/issues/680).
* ENHANCEMENT - Add WP_STATELESS_SKIP_ACL_SET for skip ACL set for GCS [#625](https://github.com/udx/wp-stateless/issues/625).
* COMPATIBILITY - Add support for The Events Calendar [#599](https://github.com/udx/wp-stateless/issues/599).

= 3.2.4 =
* FIX - Website unresponsive after Upgrade [#669](https://github.com/udx/wp-stateless/issues/669).

= 3.2.3 =
* **WP-Stateless 3.2.3 requires PHP 8.0+. Recently, Google updated the official Google API PHP Client Library used by WP-Stateless to resolve security issues. This updated library requires PHP 8.0.**
* ENHANCEMENT - Updated Client library for Google APIs.
* ENHANCEMENT - Updated Monolog library to version 3.
* ENHANCEMENT - Updated JWT library.
* FIX - Fixed vulnerability issues.
* FIX - Fixed an errors and warnings on PHP 8.1.
* FIX - Fixed an error that occured when WP_STATELESS_MEDIA_UPLOAD_CHUNK_SIZE is set.

= 3.2.2 =
* FIX -  Folder setting can't be saved from the settings page [#639](https://github.com/udx/wp-stateless/issues/639).

= 3.2.1 =
* FIX - Updated requirments.
* FIX - WP-Stateless 3.2.0 doesn’t upload docs, only images [#638](https://github.com/udx/wp-stateless/issues/638).

= 3.2.0 =
* **Before upgrading to WP-Stateless 3.2.0, please, make sure you tested it on your development environment. It may have breaking changes.**
* ENHANCEMENT - Upgraded `wpmetabox` library.
* ENHANCEMENT - Updated Client library for Google APIs.
* ENHANCEMENT - Updated Guzzle library to version 7.
* ENHANCEMENT - Updated JWT library.
* ENHANCEMENT - Updated `license` functionality, removed `update checker`.
* FIX - Fixed vulnerability issues.
* FIX - Fixed erros and warnings on PHP 8.
* FIX - problem after the upgrade [#628](https://github.com/udx/wp-stateless/issues/628).
* FIX - image_downsize() PHP8 Required parameter $id follows optional parameter $false [#619](https://github.com/udx/wp-stateless/issues/619).

= 3.1.1 =
* ENHANCEMENT - Notification for the administrator about finished synchronization. GitHub issue [#576](https://github.com/udx/wp-stateless/issues/576).
* FIX - Fixed an issue with PDF thumbnails. GitHub issue [#577](https://github.com/udx/wp-stateless/issues/577).
* FIX - Fixed an issue with synchronization in `Stateless` mode. GitHub issue [#575](https://github.com/udx/wp-stateless/issues/575).
* COMPATIBILITY - Changed the way compatibility files are stored on Multisite. GitHub issue [#588](https://github.com/udx/wp-stateless/issues/588).

= 3.1.0 =
* NEW - Completely rewritten the synchronization tool. GitHub issue [#523](https://github.com/udx/wp-stateless/issues/523).
* NEW - New configuration constant `WP_STATELESS_SYNC_MAX_BATCH_SIZE`. Sets the maximum size of a background sync batch of items to be saved in a single row in the database. [More details](https://stateless.udx.io/docs/constants/#wp_stateless_sync_max_batch_size).
* NEW - New configuration constant `WP_STATELESS_SYNC_LOG`. Sets a path to a log file where to output logging information during the background sync. [More details](https://stateless.udx.io/docs/constants/#wp_stateless_sync_log).
* NEW - New configuration constant `WP_STATELESS_SYNC_HEALTHCHECK_INTERVAL`. Defines an interval in minutes for a cron task that periodically checks the health of a particular background sync process. [More details](https://stateless.udx.io/docs/constants/#wp_stateless_sync_healthcheck_interval).
* FIX - Fixed an issue when original files were not deleted from the server in the Ephemeral mode. GitHub issue [#484](https://github.com/udx/wp-stateless/issues/484).
* FIX - Fixed an incorrect behavior of image `srcset` attribute in the Backup mode. GitHub issue [#558](https://github.com/udx/wp-stateless/issues/558).
* COMPATIBILITY - Litespeed Cache - Fixed an incorrect upload folder determination. GitHub issue [#527](https://github.com/udx/wp-stateless/issues/527).

= 3.0.4 =
* FIX - Fixed inability to use dashes in the upload folder name. GitHub issue [#565](https://github.com/udx/wp-stateless/issues/565).
* COMPATIBILITY - Elementor - Fixed wrong upload directory. GitHub issue [#560](https://github.com/udx/wp-stateless/issues/560).

= 3.0.3 =
* FIX - Fixed an incorrect file URL in Stateless mode on Edit Media screen. GitHub issue [#544](https://github.com/udx/wp-stateless/issues/544).

= 3.0.2 =
* FIX - Refactored the way files are being uploaded to GCS when `WP_STATELESS_MEDIA_UPLOAD_CHUNK_SIZE` constant is defined. GitHub issue [#553](https://github.com/udx/wp-stateless/issues/553).
* FIX - Fixed the process of upgrading to 3.0 for multisite installations. GitHub issue [#549](https://github.com/udx/wp-stateless/issues/549).

= 3.0.1 =
* FIX - Fatal Error in Stateless mode. GitHub issue [#546](https://github.com/udx/wp-stateless/issues/546).

= 3.0 =
* **Before upgrading to WP-Stateless 3.0, please, make sure you tested it on your development environment. It may have breaking changes.**
* NEW - Setup assistant rewrite. GitHub issue [#477](https://github.com/udx/wp-stateless/issues/477).
* NEW - Recreate attachment metabox panel using metabox.io. GitHub issue [#470](https://github.com/udx/wp-stateless/issues/470).
* NEW - Updated the `Stateless` mode to not use local storage at all. Current `Stateless` mode setting mapped to new `Ephemeral` mode. GitHub issue [#482](https://github.com/udx/wp-stateless/issues/482).
* NEW - Files are now uploaded to GCS in chunks and chunk size will be determined based on free memory available. GitHub issue [#478](https://github.com/udx/wp-stateless/issues/478).
* NEW - File upload chunk size can be controlled with `WP_STATELESS_MEDIA_UPLOAD_CHUNK_SIZE` constant.  GitHub issue [#478](https://github.com/udx/wp-stateless/issues/478).
* FIX - Changed the default value for the Cache-Busting setting. GitHub issue [#361](https://github.com/udx/wp-stateless/issues/361).
* FIX - Fixed network override of Cache-Busting. GitHub issue [#468](https://github.com/udx/wp-stateless/issues/468).
* FIX - Fixed "Passing glue string after array is deprecated.". GitHub issue [#444](https://github.com/udx/wp-stateless/issues/444).
* FIX - Fixed Compatibility default value in multisite. GitHub issue [#464](https://github.com/udx/wp-stateless/issues/464).
* FIX - Fixed multisite wrong GCS path. GitHub issue [#407](https://github.com/udx/wp-stateless/issues/407).
* FIX - Don't check for Google Cloud Storage connectivity in stateless mode unless uploading. GitHub issue [#442](https://github.com/udx/wp-stateless/issues/442).
* COMPATIBILITY - Google App Engine - Added new compatibility support for Google App Engine. [#486](https://github.com/udx/wp-stateless/issues/486)
* COMPATIBILITY - Elementor - Fixed wrong MIME type for CSS files. GitHub issue [#395](https://github.com/udx/wp-stateless/issues/395).
* COMPATIBILITY - Polylang - Fixed missing metadata issue. GitHub issue [#378](https://github.com/udx/wp-stateless/issues/378).
* COMPATIBILITY - EWWW - Fixed mime type for WEBP images. GitHub issue [#371](https://github.com/udx/wp-stateless/issues/371).
* COMPATIBILITY - Simple Local Avatars - Added new compatibility support for Simple Local Avatars. GitHub issue [#297](https://github.com/udx/wp-stateless/issues/297).
* COMPATIBILITY - BuddyPress - Fixed BuddyPress compatibility. GitHub issue [#275](https://github.com/udx/wp-stateless/issues/275).
* COMPATIBILITY - Divi - Fixed Divi cache issue. GitHub issue [#430](https://github.com/udx/wp-stateless/issues/430).
* COMPATIBILITY - Gravity Forms - add compatibility for Gravity Forms Signature Add-On. [#501](https://github.com/udx/wp-stateless/issues/501).
* COMPATIBILITY - Litespeed - Fixed fatal error and warnings. [#491](https://github.com/udx/wp-stateless/issues/491).
* COMPATIBILITY - Imagify - Added support for webp. [#403](https://github.com/udx/wp-stateless/issues/403).
* ENHANCEMENT - Update Client library for Google APIs. [#446](https://github.com/udx/wp-stateless/issues/446).
* ENHANCEMENT - Wildcards for bucket folder settings. GitHub issue [#149](https://github.com/udx/wp-stateless/issues/149).
* ENHANCEMENT - Better CLI integration. GitHub issue [#447](https://github.com/udx/wp-stateless/issues/447), [#450](https://github.com/udx/wp-stateless/issues/450) and [#451](https://github.com/udx/wp-stateless/issues/451).
* ENHANCEMENT - Sync media according to new Bucket Folder settings. GitHub issue [#449](https://github.com/udx/wp-stateless/issues/449).
* ENHANCEMENT - Moved Bucket Folder setting in the File URL section. GitHub issue [#463](https://github.com/udx/wp-stateless/issues/463).
* ENHANCEMENT - Hide Regenerate and Sync with GCS when the mode is Disabled. GitHub issue [#440](https://github.com/udx/wp-stateless/issues/440).
* ENHANCEMENT - New endpoint for the Google Cloud Storage JSON API. GitHub issue [#384](https://github.com/udx/wp-stateless/issues/384).
* ENHANCEMENT - Renamed current `Stateless` mode to `Ephemeral`. GitHub issue [#481](https://github.com/udx/wp-stateless/issues/481).

= 2.3.2 =
* FIX - Fixed video file doesn't get deleted from the server in `Stateless` mode. GitHub issue [#418](https://github.com/udx/wp-stateless/issues/418).
* FIX - Fixed file size doesn't show under attachment details in `Stateless` mode. GitHub issue [#413](https://github.com/udx/wp-stateless/issues/413).
* FIX - Fixed Cache-Busting feature works even if the Mode is `Disabled`. GitHub issue [#405](https://github.com/udx/wp-stateless/issues/405).
* COMPATIBILITY - Fixed Gravity Form Post Image didn't include `Bucket Folder`. GitHub issue [#421](https://github.com/udx/wp-stateless/issues/421).
* COMPATIBILITY - Fixed Divi Builder Export. GitHub issue [#420](https://github.com/udx/wp-stateless/issues/420).
* COMPATIBILITY - Fixed BuddyBoss pages breaking after updating to 2.3.0. GitHub issue [#417](https://github.com/udx/wp-stateless/issues/417).

= 2.3.1 =
* Fix - Fixed fatal error, undefined function `is_wp_version_compatible`. GitHub issue [#414](https://github.com/udx/wp-stateless/issues/414).

= 2.3.0 =
* FIX - Fixed problem with WordPress 5.3. GitHub issue [#406](https://github.com/udx/wp-stateless/issues/406).
* FIX - Fixed problem with the Cache Busting feature. GitHub issue [#377](https://github.com/udx/wp-stateless/issues/377).
* COMPATIBILITY - Added compatibility support for WP Retina 2x pro. GitHub issue [#380](https://github.com/udx/wp-stateless/issues/380).
* COMPATIBILITY - Enhanced compatibility support for LiteSpeed Cache. GitHub issue [#365](https://github.com/udx/wp-stateless/issues/365).
* COMPATIBILITY - Enhanced compatibility support for ShortPixel Image Optimizer. GitHub issue [#364](https://github.com/udx/wp-stateless/issues/364), [#398](https://github.com/udx/wp-stateless/issues/398).
* COMPATIBILITY - Fixed Gravity Form export. GitHub issue [#408](https://github.com/udx/wp-stateless/issues/408).
* ENHANCEMENT - Improved upon add_media function for better compatibility support. GitHub issue [#382](https://github.com/udx/wp-stateless/issues/382).

= 2.2.7 =
* FIX - WP-Smush compatibility enhanced. GitHub Issue [#366](https://github.com/udx/wp-stateless/issues/366).
* FIX - Fixed multisite installation support. GitHub Issue [#370](https://github.com/udx/wp-stateless/issues/370).
* FIX - Fixed settings UI problems related to Cache-Busting option. GitHub Issue [#373](https://github.com/udx/wp-stateless/issues/373).
* FIX - Other minor fixes.

= 2.2.6 =
* FIX - Multisite Network Settings page fixed. GitHub Issue [#369](https://github.com/udx/wp-stateless/issues/369).
* FIX - Fixed incorrect Compatibilities behavior when Bucket Folder is set. GitHub Issue [#368](https://github.com/udx/wp-stateless/issues/368).
* FIX - Other minor fixes.

= 2.2.5 =
* NEW - Added ability to start sync process from specific Attachment ID. GitHub Issue [#360](https://github.com/udx/wp-stateless/issues/360).
* COMPATIBILITY - Added compatibility support for LiteSpeed Cache plugin. Especially to support optimized .webp images. GitHub Issue [#357](https://github.com/udx/wp-stateless/issues/357).
* FIX - Other minor fixes.

= Earlier versions =
Please refer to the separate changelog.txt file.
