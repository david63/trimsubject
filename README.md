# Trim Subject extension for phpBB

Set the length of a topic subject.

[![Build Status](https://github.com/david63/trimsubject/workflows/Tests/badge.svg)](https://github.com/phpbb-extensions/david63/trimsubject)
[![License](https://poser.pugx.org/david63/trimsubject/license)](https://packagist.org/packages/david63/trimsubject)
[![Latest Stable Version](https://poser.pugx.org/david63/trimsubject/v/stable)](https://packagist.org/packages/david63/trimsubject)
[![Latest Unstable Version](https://poser.pugx.org/david63/trimsubject/v/unstable)](https://packagist.org/packages/david63/trimsubject)
[![Total Downloads](https://poser.pugx.org/david63/trimsubject/downloads)](https://packagist.org/packages/david63/trimsubject)
[![codecov](https://codecov.io/gh/david63/trimsubject/branch/master/graph/badge.svg?token=D2500PgRex)](https://codecov.io/gh/david63/trimsubject)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/e317a9fe465c484fa007ceccc0a9d8da)](https://www.codacy.com/manual/david63/trimsubject?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=david63/trimsubject&amp;utm_campaign=Badge_Grade)

[![Compatible](https://img.shields.io/badge/compatible-phpBB:3.2.x-blue.svg)](https://shields.io/)
[![Compatible](https://img.shields.io/badge/compatible-phpBB:3.3.x-blue.svg)](https://shields.io/)

## Minimum Requirements
* phpBB 3.2.0
* PHP 5.4

## Install
1. [Download the latest release](https://github.com/david63/trimsubject/archive/3.2.zip) and unzip it.
2. Unzip the downloaded release and copy it to the `ext` directory of your phpBB board.
3. Navigate in the ACP to `Customise -> Manage extensions`.
4. Look for `Trim last subject` under the Disabled Extensions list and click its `Enable` link.

## Usage
1. Navigate in the ACP to `General -> Post Settings -> Trim last subject`.
2. Set the subject length.

## Uninstall
1. Navigate in the ACP to `Customise -> Manage extensions`.
2. Click the `Disable` link for `Trim last subject`.
3. To permanently uninstall, click `Delete Data`, then delete the trimsubject folder from `phpBB/ext/david63/`.

## License
[GNU General Public License v2](http://opensource.org/licenses/GPL-2.0)

© 2019 - David Wood