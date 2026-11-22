# Mask – community fork with TYPO3 v14 support

This is a fork of [Mask](https://github.com/Gernott/mask) by WEBprofil – Gernot Ploiner e.U. and Nikita Hovratov.
The original package `mask/mask` is no longer maintained. This fork continues it and adds TYPO3 v14 support.
It is not affiliated with the original maintainers.

The extension key stays `mask`, so existing installations, content elements, database fields and templates keep working.

### Switching from `mask/mask`

```bash
composer remove mask/mask
composer require michael-nussbaumer/mask
```

The package replaces `mask/mask`, so both can't be installed at the same time.
This fork is not published in the TYPO3 Extension Repository (TER). Without Composer, download the release zip from
GitHub and upload it in the Extension Manager.

![Page and Content masks for TYPO3](Resources/Public/Images/banner.jpg)

[![TYPO3 compatibility](https://img.shields.io/badge/TYPO3-14.3%20%7C%2013.4-ff8700?maxAge=3600&logo=typo3)](https://get.typo3.org/)
[![Release](https://img.shields.io/github/v/release/Michael-Nussbaumer/mask?sort=semver)](https://github.com/Michael-Nussbaumer/mask/releases)
[![Total Downloads](https://poser.pugx.org/michael-nussbaumer/mask/d/total.svg)](https://packagist.org/packages/michael-nussbaumer/mask)
[![Tests](https://img.shields.io/github/actions/workflow/status/Michael-Nussbaumer/mask/tests.yaml?branch=main)](https://github.com/Michael-Nussbaumer/mask/actions/workflows/tests.yaml)
[![PHPStan](https://img.shields.io/badge/PHPStan-enabled-brightgreen.svg?style=flat)](https://github.com/phpstan/phpstan)

# TYPO3 extension `mask` :performing_arts:

Mask is a content element builder that generates TypoScript, TSconfig and TCA on
the fly. You can build your own custom content elements in a user-friendly
backend module via drag and drop. Your configuration is stored in json files,
which can be shared across projects.

Mask provides different field types, that you can use to
customize your content elements. Depending on the type there are different
options available. Field types are grouped roughly into input, repeating and
structural fields. With these given tools, you can cover almost all typical
requirements for your projects. And if not, Mask can be extended
via TCA overrides or DataProcessors.

|                  | URL                                            |
|------------------|------------------------------------------------|
| **Repository:**  | https://github.com/Michael-Nussbaumer/mask                         |
| **Packagist:**   | https://packagist.org/packages/michael-nussbaumer/mask             |
| **Read online:** | https://docs.typo3.org/p/mask/mask/main/en-us/ (original project) |

## TYPO3 v13 Sponsor

Big thanks to [webconsulting](https://webconsulting.at/) for sponsoring the work on the Mask v9 release for TYPO3 v13!

![webconsulting](Documentation/Images/SponsorsManual/webconsulting.png)

## Quickstart :rocket:

1. Add Mask as a dependency in your `ext_emconf.php` and/or `composer.json` of your sitepackage.
2. Download Mask with composer by running the command `composer require michael-nussbaumer/mask` or upload the release zip in the extension manager.
3. Activate Mask in the extension manager (not needed in TYPO3 v11 composer mode).
4. Mask requires `fluid_styled_content` so go to your static includes in the template module and include it there.
5. Also include the Mask static TypoScript.
6. Navigate to the Mask module and enter your sitepackage extension key for auto-configuration (your extension must be loaded!).
7. Start creating your own content elements!

## Manual configuration :pencil2:

If you don't want to use the default folder structure created by the auto-configuration, you can adjust every path in
the extension configuration of Mask.

## Advantages of Mask :white_check_mark:

* Mask stores the content in columns in database tables – not as XML (Flexform)
* Mask reuses existing database fields to conserve the database
* Mask works only with existing features of the TYPO3 core: backend layouts, Fluid, TypoScript
* Silent TCA migrations allow for easy TYPO3 upgrades to new major versions
* Mask allows repeating content with IRRE technology
* Mask supports multi-language projects
* Mask supports workspaces and versioning
* The Mask backend is a single page application based on VueJS for even more comfort

Read a detailed explanation for each advantage and why to use Mask over other alternatives in the [official documentation](https://docs.typo3.org/p/mask/mask/main/en-us/Introduction/Index.html).

## Mask versions :calendar:

| Mask Version | TYPO3 Version | Release Date | Status       | More Info                                                                                              |
|--------------|---------------|--------------|--------------|--------------------------------------------------------------------------------------------------------|
| v10.0        | v13, v14      | unreleased   | development  | TYPO3 v14 support (fork)                                                                               |
| v9.0         | v12, v13      | 2024-11-13   | discontinued | [TYPO3 v13 support](https://github.com/Gernott/mask/releases/tag/v9.0.0)                               |
| v8.3         | v11, v12      | 2023-08-09   | discontinued | [Mask Events](https://docs.typo3.org/p/mask/mask/main/en-us/ChangeLog/8.3/Index.html)                  |
| v8.2         | v11, v12      | 2023-06-12   | discontinued | [TCA columnsOverride support](https://docs.typo3.org/p/mask/mask/main/en-us/ChangeLog/8.2/Index.html)  |
| v8.1         | v11, v12      | 2023-05-02   | discontinued | [Deprecation free, new types](https://docs.typo3.org/p/mask/mask/main/en-us/ChangeLog/8.1/Index.html)  |
| v8.0         | v11, v12.3    | 2022-10-24   | discontinued | [Compatibility TYPO3 v12](https://docs.typo3.org/p/mask/mask/main/en-us/ChangeLog/8.0/Index.html)      |
| v7.2         | v10, v11      | 2022-05-25   | discontinued | [New field types, improved UX](https://docs.typo3.org/p/mask/mask/main/en-us/ChangeLog/7.2/Index.html) |
| v7.1         | v10, v11      | 2021-12-14   | discontinued | [JsonSplitLoader, new API](https://docs.typo3.org/p/mask/mask/main/en-us/ChangeLog/7.1/Index.html)     |
| v7.0         | v10, v11      | 2021-05-12   | discontinued | [VueJS based Mask Backend](https://docs.typo3.org/p/mask/mask/main/en-us/ChangeLog/7.0/Index.html)     |
| v6           | v10, v11.1    | 2020-10-08   | discontinued | [Palettes, Groups and more](https://docs.typo3.org/p/mask/mask/main/en-us/ChangeLog/6.0/Index.html)    |
| v5           | v10           | 2020-04-18   | discontinued | Please update to v7                                                                                    |
| v4           | v9            | 2018-10-04   | discontinued |                                                                                                        |
| v3           | v8            | 2017-05-23   | discontinued |                                                                                                        |
| v2           | v7            | 2016-05-10   | discontinued |                                                                                                        |
| v1           | v6, v7        | 2015-08-12   | discontinued |                                                                                                        |

## Need help? :left_speech_bubble:

* Read how to install, configure and use mask in the [official documentation](https://docs.typo3.org/p/mask/mask/main/en-us/)
* Join the "#ext-mask" channel on [TYPO3 Slack](https://typo3.slack.com/archives/C0FD5F6P2) and ask the mask community.
* [Visit our website](https://mask.webprofil.at) to find more information about mask

## Found a bug? :boom:

* First check out the main branch and verify that the issue is not yet solved
* Have a look at the existing [issues](https://github.com/Michael-Nussbaumer/mask/issues), to prevent duplicates
* If not found, report the bug in the [issue tracker](https://github.com/Michael-Nussbaumer/mask/issues/new)

## Like a new feature? :bulb:

* Open a [feature request](https://github.com/Michael-Nussbaumer/mask/issues/new) in the issue tracker
* Pull requests are welcome

## [Sponsors](https://docs.typo3.org/p/mask/mask/main/en-us/Sponsors/Index.html) :handshake:

See a list of all [sponsors](https://docs.typo3.org/p/mask/mask/main/en-us/Sponsors/Index.html), who helped Mask to
become what it is today.
