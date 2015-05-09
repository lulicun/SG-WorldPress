VAGRANTFILE_API_VERSION = '2'
box      = 'trust64'
url      = 'https://cloud-images.ubuntu.com/vagrant/trusty/current/trusty-server-cloudimg-amd64-vagrant-disk1.box'
hostname = 'local-www'
domain   = 'shigengmaoyi.com'
ip       = '192.168.0.49'
vm_name     = 'sg-www-vm'
ram      = '512'

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
    config.vm.box = box
    config.vm.box_url = url
    config.vm.host_name = hostname + '.' + domain
    config.vm.network 'private_network', ip: ip
    config.vm.synced_folder './', '/var/www/SG/', :owner=>'www-data', :group=>'www-data'

    config.vm.provider :virtualbox do |virtualbox|
        virtualbox.customize ['modifyvm', :id, '--name', vm_name]
        virtualbox.customize ['modifyvm', :id, '--natdnshostresolver1', 'on']
        virtualbox.customize ['modifyvm', :id, '--natdnsproxy1', 'on']
        virtualbox.customize ['modifyvm', :id, '--memory', ram]
        virtualbox.customize ['setextradata', :id, '--VBoxInternal2/SharedFoldersEnableSymlinksCreate/v-root', '1']
    end

    config.vm.provision :shell, :path => 'provision.sh'

    config.vm.provision :puppet do |puppet|
      puppet.manifests_path = 'puppet/manifests'
      puppet.module_path = 'puppet/modules'
      puppet.options = ['--verbose']
    end
end