variable "cpus" {
  type    = number
  default = 2
}

variable "memory" {
  description = "RAM per VM. 4 * 1536M = 6 GiB. On an 8 GB Mac, pass -var memory=1G."
  type        = string
  default     = "1536M"
}

variable "disk" {
  type    = string
  default = "8G"
}

variable "ssh_public_key_path" {
  description = "Public key injected into the VMs. Run `ssh-keygen -t ed25519` first if you don't have one."
  type        = string
  default     = "~/.ssh/id_ed25519.pub"
}

variable "ssh_private_key_path" {
  description = "Matching private key Ansible uses to connect."
  type        = string
  default     = "~/.ssh/id_ed25519"
}
