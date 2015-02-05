# Moodle QA Environment

This project is based on [Varying Vagrant Vagrants](https://github.com/varying-vagrant-vagrants), an open source [Vagrant](http://vagrantup.com) configuration. VVV is [MIT Licensed](https://github.com/varying-vagrant-vagrants/vvv/blob/master/LICENSE).

## Overview

### The Purpose of the Moodle QA Environment

The primary goal of this project is to provide an approachable development environment that matches a typical production environment.

The environment is ideal for developing themes and plugins as well as for contributing to Moodle core.

It includes a local installation of the Continuous Integration tool Jenkins, which is used to construct a QA Pipeline. This pipeline handles the quality assurance process fully automatically.

### The First Vagrant Up

1. Start with any local operating system such as Mac OS X, Linux, or Windows.
1. Install [VirtualBox 4.3.x](https://www.virtualbox.org/wiki/Downloads)
1. Install [Vagrant 1.7.x](http://www.vagrantup.com/downloads.html)
    * `vagrant` will now be available as a command in your terminal, try it out.
    * ***Note:*** If Vagrant is already installed, use `vagrant -v` to check the version. You may want to consider upgrading if a much older version is in use.
1. Install the [vagrant-hostsupdater](https://github.com/cogitatio/vagrant-hostsupdater) plugin with `vagrant plugin install vagrant-hostsupdater`
    * Note: This step is not a requirement, though it does make the process of starting up a virtual machine nicer by automating the entries needed in your local machine's `hosts` file to access the provisioned domains in your browser.
    * If you choose not to install this plugin, a manual entry should be added to your local `hosts` file that looks like this: `192.168.50.4  vvv.dev local.moodle.dev local.moodle.qa`
1. Install the [vagrant-triggers](https://github.com/emyl/vagrant-triggers) plugin with `vagrant plugin install vagrant-triggers`
    * Note: This step is not a requirement. When installed, it allows for various scripts to fire when issuing commands such as `vagrant halt` and `vagrant destroy`.
    * By default, if vagrant-triggers is installed, a `db_backup` script will run on halt, suspend, and destroy that backs up each database to a `dbname.sql` file in the `{vvv}/database/backups/` directory. These will then be imported automatically if starting from scratch. Custom scripts can be added to override this default behavior.
    * If vagrant-triggers is not installed, VVV will not provide automated database backups.
1. Clone or extract the project into a local directory
    * `git clone https://github.com/commana/moodle-vagrant moodle-vagrant`
1. In a command prompt, change into the new directory with `cd moodle-vagrant`
1. Start the Vagrant environment with `vagrant up`
    * Be patient as the magic happens. This could take a while on the first run as your local machine downloads the required files. Especially the cloning process of Moodle will take some time.
    * Watch as the script ends, as an administrator or `su` ***password may be required*** to properly modify the hosts file on your local machine.
1. Visit [http://vvv.dev/](http://vvv.dev/) in your browser.

#### Caveats

The network configuration picks an IP of 192.168.50.4. It could cause conflicts on your existing network if you *are* on a 192.168.50.x subnet already. You can configure any IP address in the `Vagrantfile` and it will be used on the next `vagrant up`

The default memory allotment for the virtual machine is 2048MB. If you would like to raise or lower this value to better match your system requirements, a [guide to changing memory size](https://github.com/Varying-Vagrant-Vagrants/VVV/wiki/Customising-your-Vagrant's-attributes-and-parameters) is in the wiki.

### Credentials and Such

The database username and password for Moodle is `mdl` and `mdl`. The Admin account for Moodle is `admin` and `Moodle1!`.

#### Moodle master
* LOCAL PATH: moodle-vagrant/www/moodle-master
* VM PATH: /srv/www/moodle-master
* URL: `http://local.moodle.dev`
* DB Name: `moodle`

#### MySQL Root
* User: `root`
* Pass: `root`
* See: [Connecting to MySQL](https://github.com/varying-vagrant-vagrants/vvv/wiki/Connecting-to-MySQL) from your local machine

## Is it any good?

Yes.

## Credits

Moodle QA Environment is powered by THM - Technische Hochschule Mittelhessen - University of Applied Sciences.

VVV is copyright (c) 2014, the contributors of the VVV project under the [MIT License](https://github.com/varying-vagrant-vagrants/vvv/blob/master/LICENSE).
