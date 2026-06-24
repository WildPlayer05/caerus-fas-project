variable "node_names" {
  description = "VMs in order: [0]=edge (LB+redis+monitoring), [1]=db, [2..]=app nodes"
  type        = list(string)
  default     = ["caerus-edge", "caerus-db", "caerus-app-1", "caerus-app-2"]
}

variable "cpus" {
  type    = number
  default = 2
}

variable "memory" {
  description = "RAM per VM (trailing unit required). 4 VMs * 1536 MiB = 6 GiB total. Bump the edge node if Grafana feels slow."
  type        = string
  default     = "1536 mib"
}

variable "box_image" {
  description = <<-EOT
    URL or local path to an Ubuntu 22.04 VirtualBox vagrant box.
    If the URL 404s, download a .box once and point this at the local file.
  EOT
  type        = string
  default     = "https://app.vagrantup.com/ubuntu/boxes/jammy64/versions/20240821.0.1/providers/virtualbox.box"
}

variable "hostonly_interface" {
  description = <<-EOT
    VirtualBox host-only interface name.
    Linux/macOS: "vboxnet0".  Windows: "VirtualBox Host-Only Ethernet Adapter".
    Create it in Host Network Manager and ENABLE its DHCP server first.
  EOT
  type        = string
  default     = "vboxnet0"
}
