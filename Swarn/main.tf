terraform {
  required_providers {
    virtualbox = {
      source  = "terra-farm/virtualbox"
      version = "0.2.2-alpha.1"
    }
    local = {
      source  = "hashicorp/local"
      version = "~> 2.5"
    }
  }
}

# 4 VMs, named by role. Order matters: [0]=edge, [1]=db, [2..]=app
resource "virtualbox_vm" "node" {
  count  = length(var.node_names)
  name   = var.node_names[count.index]
  image  = var.box_image
  cpus   = var.cpus
  memory = var.memory

  network_adapter {
    type = "nat" # outbound internet
  }

  network_adapter {
    type           = "hostonly" # Swarm traffic + SSH from host
    host_interface = var.hostonly_interface
  }
}

# Hand-off to Ansible: write a role-based inventory from the host-only IPs.
resource "local_file" "ansible_inventory" {
  filename = "${path.module}/../ansible/inventory.ini"
  content = templatefile("${path.module}/inventory.tftpl", {
    edge = virtualbox_vm.node[0].network_adapter[1].ipv4_address
    db   = virtualbox_vm.node[1].network_adapter[1].ipv4_address
    apps = [for i, vm in virtualbox_vm.node : vm.network_adapter[1].ipv4_address if i >= 2]
  })
}
