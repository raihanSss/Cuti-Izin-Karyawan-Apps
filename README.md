# Aplikasi Cuti Karyawan


# Installation

```
# clone the repo
$ git clone https://github.com/Fahrul23/cuti_karyawan_app.git

# go into app's directory
$ cd cuti_karyawan_app

# Install Depedency
$ composer install

# Setup Environment Variable
$ cp .env.example .env
$ php artisan key:generate

# create database
1. go to phpmyadmin
2. create a database with the name cuti_karyawan_app

# Migrate & Seed
$ php artisan migrate --seed

```

# Basic usage

```
# Access the website with the url in a web browser
  http://localhost/cuti_karyawan_app/public
	
```

# User Account

```
# Account Karyawan
  username : fahrul@example.com
  password : fahrul123

# Account Super Admin
  username : galih@example.com
  password : galih123  

# Account Staf HR
  username : iksan@example.com
  password : iksan123 
	
```
