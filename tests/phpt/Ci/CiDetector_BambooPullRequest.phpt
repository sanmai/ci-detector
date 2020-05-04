--TEST--
Bamboo: Detect properties of PR build

--ENV--
bamboo_buildKey=KEY-FOO-JOB1
bamboo_buildNumber=3
bamboo_buildPlanName=Plan Name - Foo Lorem ipsum - Default Job
bamboo_buildResultKey=KEY-FOO-JOB1-3
bamboo_buildResultsUrl=https://bamboo.foo.bar/browse/KEY-FOO-JOB1-3
bamboo_buildTimeStamp=2016-07-29T22:48:02.891+02:00
bamboo_planKey=KEY-FOO
bamboo_planName=Plan Name - Foo Lorem ipsum
bamboo_planRepository_1_branch=branch-name
bamboo_planRepository_1_name=Repo name
bamboo_planRepository_1_previousRevision=e01b71b3434c0441b24563f1c180bc615f9467d3
bamboo_planRepository_1_repositoryUrl=ssh://git@gitserver:7999/project/repo.git
bamboo_planRepository_1_revision=3e01b71b3434c0441b24563f1c180bc615f9467d
bamboo_planRepository_branch=branch-name
bamboo_planRepository_branchName=branch-name
bamboo_planRepository_name=Repo name
bamboo_planRepository_previousRevision=e01b71b3434c0441b24563f1c180bc615f9467d3
bamboo_planRepository_repositoryUrl=ssh://git@gitserver:7999/project/repo.git
bamboo_planRepository_revision=3e01b71b3434c0441b24563f1c180bc615f9467d
bamboo_repository_2818049_branch_name=branch-name
bamboo_repository_2818049_git_branch=branch-name
bamboo_repository_2818049_git_repositoryUrl=ssh://git@gitserver:7999/project/repo.git
bamboo_repository_2818049_name=Repo name
bamboo_repository_2818049_previous_revision_number=e01b71b3434c0441b24563f1c180bc615f9467d3
bamboo_repository_2818049_revision_number=3e01b71b3434c0441b24563f1c180bc615f9467d
bamboo_repository_pr_key=42
bamboo_resultsUrl=https://bamboo.foo.bar/browse/KEY-FOO-JOB1-3
bamboo_shortJobKey=JOB1
bamboo_shortJobName=Default Job
bamboo_shortPlanKey=foo
bamboo_shortPlanName=Plan Name
bamboo.repository_pr_sourceBranch=pr-branch
bamboo.repository_pr_targetBranch=branch-name

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
string(11) "branch-name"
