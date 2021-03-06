--TEST--
AppVeyor: Detect properties of PR build

--ENV--
APPVEYOR_ACCOUNT_NAME=OndraM
APPVEYOR_API_URL=http://localhost:1563/
APPVEYOR_BUILD_FOLDER=C:\projects\ci-detector
APPVEYOR_BUILD_ID=8791806
APPVEYOR_BUILD_NUMBER=37
APPVEYOR_BUILD_VERSION=1.3.37
APPVEYOR_BUILD_WORKER_IMAGE=Visual Studio 2017
APPVEYOR_JOB_ID=kjsgl2y74ky79q5g
APPVEYOR_JOB_NUMBER=1
APPVEYOR_PROJECT_ID=321955
APPVEYOR_PROJECT_NAME=ci-detector
APPVEYOR_PROJECT_SLUG=ci-detector
APPVEYOR_PULL_REQUEST_HEAD_COMMIT=4adb3ce7ab78a1aeec59271f81d15fdec9c3d899
APPVEYOR_PULL_REQUEST_HEAD_REPO_BRANCH=feature/pr-branch
APPVEYOR_PULL_REQUEST_HEAD_REPO_NAME=foo/ci-detector
APPVEYOR_PULL_REQUEST_NUMBER=42
APPVEYOR_PULL_REQUEST_TITLE=Foo bar PR title
APPVEYOR_REPO_BRANCH=main
APPVEYOR_REPO_COMMIT_AUTHOR_EMAIL=foo@example.com
APPVEYOR_REPO_COMMIT_AUTHOR=foo
APPVEYOR_REPO_COMMIT_MESSAGE=Foo bar PR commit message
APPVEYOR_REPO_COMMIT_TIMESTAMP=2020-02-11T11:48:29.0000000Z
APPVEYOR_REPO_COMMIT=08750c66ed93c27a192d1b6bd5614788f1e5f1e9
APPVEYOR_REPO_NAME=OndraM/ci-detector
APPVEYOR_REPO_PROVIDER=gitHub
APPVEYOR_REPO_SCM=git
APPVEYOR_REPO_TAG=false
APPVEYOR_URL=https://ci.appveyor.com
APPVEYOR=True
CI=True
HOMEDRIVE=C:
HOMEPATH=\Users\appveyor
OS=Windows_NT
Platform=x64
SystemDrive=C:
SystemRoot=C:\Windows
USERDOMAIN_ROAMINGPROFILE=APPVYR-WIN
USERDOMAIN=APPVYR-WIN
USERNAME=appveyor
windir=C:\Windows

--FILE--
<?php

require __DIR__ . '/../../../vendor/autoload.php';

$ci = (new OndraM\CiDetector\CiDetector())->detect();
echo "Is pull request:\n";
var_dump($ci->isPullRequest()->describe());
echo "Git branch:\n";
var_dump($ci->getGitBranch());

--EXPECT--
Is pull request:
string(3) "Yes"
Git branch:
string(17) "feature/pr-branch"
