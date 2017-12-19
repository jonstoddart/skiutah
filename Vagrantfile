Vagrant.configure("2") do |config|
  # Specify base box image
  config.vm.box = "ubuntu/xenial64"

  # Provision box
  config.vm.provision :shell, path: "devops/provision.sh"

  # Forward localhost ports to VM ports
  config.vm.network :forwarded_port, host: 8000, guest: 80
  config.vm.network :forwarded_port, host: 4430, guest: 443

  # Sync app folder to web root
  config.vm.synced_folder ".", "/var/www/skiutah", create: true, group: "www-data", owner: "www-data"
end
