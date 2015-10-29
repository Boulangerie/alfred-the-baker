# Bob Jobs (v1.0) - Jenkins

This workflow will just query available jobs w/ your user and open/build the selected project.

[info](https://github.com/Boulangerie/alfred-the-backer/blob/master/bob-jobs/) | [download](https://github.com/Boulangerie/alfred-the-backer/raw/master/bob-jobs/bobjobs.alfredworkflow)

## Installation

1. Download the [bobjobs.alfredworkflow](https://github.com/Boulangerie/alfred-the-backer/raw/master/bob-jobs/bobjobs.alfredworkflow)
2. Install it through Alfred 
3. Edit `Run Script` and set your credentials
```
$JENKINS_PROTOCOL = "YOU JENKINS PROTOCOL (eg. https://)";
$JENKINS_USER = "YOUR JENKINS USER";
$JENKINS_TOKEN = "YOUR JENKINS TOKEN";
$JENKINS_URL = "YOUR JENKINS URL (without protocol)";
```
