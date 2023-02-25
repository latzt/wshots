# Wedding Photos (wshots)

A small [Symfony 6.2](https://symfony.com/doc/current/index.html) application to allow users in a secure network to upload their photos.


## Start local dev environment

Please install ddev first: https://ddev.readthedocs.io/en/latest/users/install/ddev-installation/

To start environment:

`cd code && ddev start`

... if done coding, stop the environment:

`ddev stop`


## Security 

Please be warned that the users are not restricted how much they upload and who they are. No authentication or authorization is done.


## Todo List

- [ ] Make frontend beautiful
  - [ ] Target browsers: mobile devices
  - [ ] Add progress bar for upload form 
- [ ] Generate QR-code with URL for guests
- [ ] Add disk usage check, to prevent full disk
  - [ ] Or: even better, store uploads on an external storage solution (e.g. S3)
- [ ] Maybe add a database to let guests enter their name or a greeting along the uploads
