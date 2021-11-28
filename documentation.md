# DOCUMENTATION FOR YOUTUBEI ENDPOINTS AND STUFF

> /youtubei/v1/browse
This is the main, and most important youtubei endpoint that we need.
Browse requests data such as video suggestions, channel videos and subscriptions, among other useful stuff that, when PBJ was still used, was seperated into tons of different endpoints.

Depending on the "browse id", this section can either require or dont require a SAPISID to return data. BrowseIds that DON'T need a SAPISID include:
    - FEwhat_to_watch
    - FEexplore