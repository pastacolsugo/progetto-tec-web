# Dev Notes

## TODOs

When adding a TODO we should try to remember to add useful tags to it.

Tag format: `TODO #tag1 #tag2 ... #tagX: todo message`

Tag list:

- `#a11y`: accessibility related tag


## Artisan

When using Artisan with Docker it's important to call it using `./vendor/bin/sail`


### Custom console commands

There is the possibility to create custom Artisan commands, to perform application-specific commands in one go. The code location for such commands is `routes/console.php`.