terraform {
  required_providers {
    multipass = {
      source = "todoroff/multipass" # rich provider: exposes ipv4 + cloud-init
    }
    local = {
      source  = "hashicorp/local"
      version = "~> 2.5"
    }
  }
}

provider "multipass" {
  default_image = "22.04"
}

locals {
  nodes = {
    "caerus-edge"  = "edge"
    "caerus-db"    = "db"
    "caerus-app-1" = "app"
    "caerus-app-2" = "app"
  }
  ssh_pubkey = trimspace(file(pathexpand(var.ssh_public_key_path)))
}

resource "multipass_instance" "node" {
  for_each = local.nodes

  name   = each.key
  image  = "22.04"
  cpus   = var.cpus
  memory = var.memory
  disk   = var.disk

  cloud_init = templatefile("${path.module}/cloud-init.yaml.tftpl", {
    ssh_key = local.ssh_pubkey
  })
}

resource "local_file" "ansible_inventory" {
  filename = "${path.module}/../ansible/inventory.ini"
  content = templatefile("${path.module}/inventory.tftpl", {
    edge         = multipass_instance.node["caerus-edge"].ipv4[0]
    db           = multipass_instance.node["caerus-db"].ipv4[0]
    apps         = [for n in ["caerus-app-1", "caerus-app-2"] : multipass_instance.node[n].ipv4[0]]
    ssh_key_file = var.ssh_private_key_path
  })
}
