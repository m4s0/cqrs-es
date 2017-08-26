# Cqrs + Event sourcing

 
Requirements
=

- Vagrant (> 1.8.x) with HostManager plugin (vagrant plugin install vagrant-hostmanager)
- Virtualbox (5.0.x)


Project Configuration
=
```

cd PATH/OF/PROJECT && cp vagrantconfig.yml.dist vagrantconfig.yml && vagrant up
vagrant ssh
cd /var/www
```

Run tests:

```
cd /var/www
bin/phpunit -c ./ --colors
```