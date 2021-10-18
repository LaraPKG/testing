# LaraPkg Testing

This module is set up to enable packages access to unified coding standards and testing 
tools for package development, for example traits used for package unit tests, the ability to
mock things.

It also allows CI/CD pipelines to run against the standards set out within this package as
failures will produce error exit codes stopping your pipeline.

## Installing

To install this package simply `composer require larapkg/testing` 

## Usage

In your package `composer.json` add the following at the end of the file as the testing
binary will be copied to your vendor/bin directory on installation.

```shell
"scripts": [
  "testing": "./vendor/bin/testing"
]
```

You will now be able to run the command `composer testing` in your package root to
run the testing tool.

Using the above command will run a console instance with the available commands for
checking standards, fixing coding standards issues and running static analysis.

If doing work to submit to the LaraPKG Organisation then require this module is it
does not already exist in the repo you are working on as a PR will be unable to merge
without it.

If not using this package for working with a LaraPKG package then it is advisable to
fork this repo and add your unit traits' etcetera, to your own version as you develop them.

## Available Commands

The package provides several commands

Code Standards:

 - cs:all
 - cs:code_sniffer
 - cs:psalm
 - cs:mess_detector
 - cs:loc

Fix Tools:

 - fix:all
 - fix:code_beautifier
 - fix:psalm

Unit Testing:

 - test

Utilities:

 - test:copy

### CS:ALL

The `composer testing cs:all` command will run all above code standards commands.

### CS:CODE_SNIFFER

The `composer testing cs:code_sniffer` command will run the code sniffer standards checks separately,
at LaraPKG we use WebImpress Coding Standards with minor alterations which can be found in the ruleset.xml
file at the base of this repository. [Web Impress](https://github.com/webimpress/coding-standard) - 
[Code Sniffer](https://github.com/squizlabs/PHP_CodeSniffer)

When the command is run, if a rule is found to be violated it will be displayed below the infringed rule.

### CS:PSALM

When the `composer testing cs:psalm` command is run, static analysis will be tested across the package.
We use the highest level of alert in an attempt to get the highest quality code possible
into the repositories, free from bugs. [Psalm](https://psalm.dev/)

### CS:MESS_DETECTOR

Mess Detector `composer testing cs:mess_detector` is a tool for weeding out bad code and helps massively to improve practice
and to reduce unforeseen design flaws whilst encouraging best practice.
We use several rule sets for mess detector:

 - codesize
 - controversial
 - design
 - cleancode

We believe this makes a good set of rules for producing solid code.

Note if using this tool within a large code base, you may find certain practices too 
large to handle, it is advisable to cure everything you can first and then create a baseline
file to ignore the violations that you want to remain present. Please read mess detectors
website for advice on this. [Mess Detector](https://phpmd.org/)

### CS:LOC

`composer testing cs:loc` PhpLoc is a tool for quickly measuring the size and analyzing the structure
of a PHP project.

It will provide you with an analysis of the complexity of your codebase. [PhpLoc](https://github.com/sebastianbergmann/phploc)

### FIX::ALL

The `composer testing fix:all` command will run all the fixing tools, be careful!

### FIX:CODE_BEAUTIFIER

The `composer testing fix:code_beautifier` command will run code sniffers companion fixer
tool using the same set of standards that code sniffer uses to analyse you code base so
should be quite safe to run. [Code Sniffer](https://github.com/squizlabs/PHP_CodeSniffer)

### FIX:PSALTER

The `composer testing fix:psalter` command runs Psalms companion fixing tool, whilst this
is relatively safe to do as we have limited what it fixes, it "could" produce more work for you
so if you do use it, do so before running the `cs` command then you won't know if its produced
more work for you. [Psalm](https://psalm.dev/)

### TEST

The `composer testing test` command will fire uup phpunit to run your unit tests, as this package
is for working with packages for Lumen or Laravel we also pull in `orchestra/testbench`
[Testbench](https://packages.tools/testbench/getting-started/introduction.html#installation)

### TEST:COPY

The `composer testing test:copy` command is a utility command that you will not need
to run manually. When the `test` command is run, if you have no phpunit.xml in the base of your
code base, this command will be run to add it using our basic template.


And that completes the roundup of the commands within the package, you should see that this
will help you to achieve a high standard of practice, quality and reliability within your
code bases. Good Luck!


