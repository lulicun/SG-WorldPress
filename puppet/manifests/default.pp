Exec { path => [ '/bin/', '/sbin/', '/usr/bin/', '/usr/sbin/' ] }

package { 'make':
    ensure => installed
}

package { 'curl':
    ensure => installed,
    require => Package['php5']
}

package { 'git':
    ensure => installed
}

package { 'memcached':
    ensure => installed
}

package { 'postfix':
    ensure => installed
}

class { 'apache':
  mpm_module => 'prefork'
}
include apache::mod::php
apache::mod { 'rewrite': }

apache::vhost { 'local-www.shigengmaoyi.com':
    servername => 'local-www.shigengmaoyi.com',
    port => '80',
    docroot => '/var/www/SG/web',
    directories => [{
        path => '/var/www/SG/web'
    }],
}

class { '::mysql::server':
    root_password => 'test',
}

mysql::db { ['sgdb']:
  ensure   => present,
  charset  => 'utf8',
  user     => 'sg',
  password => 'test',
  host     => 'localhost',
  grant    => ['ALL'],
  require  => Class['mysql::server']
}


include apt

include php
class php {

    package { 'php5':
        ensure => installed,
    }

    package { 'php5-dev':
        require => Package['php5'],
        ensure => installed
    }

    package { 'php-pear':
        require => Package['php5-dev'],
        ensure => installed,
    }

    package { 'php5-xdebug':
        require => Package['php5'],
        ensure => installed
    }

    package { 'php5-mysql':
        require => Package['php5'],
        ensure => installed
    }

    package { 'php5-memcached':
        require => Package['php5'],
        ensure => installed
    }

    package { 'php5-cli':
        require => Package['php5'],
        ensure => installed
    }

    package { 'php5-curl':
        require => Package['php5'],
        ensure => installed
    }

    package { 'php5-mcrypt':
        require => Package['php5'],
        ensure => installed
    }

    file { '/etc/php5/mods-available/xdebug.ini':
        ensure => present,
        mode => 0644,
        owner => 'root',
        group => 'root',
        source => '/vagrant/puppet/files/xdebug.ini',
        require => Package['php5-xdebug']
    }

}
