variable "cpus" {
  type    = number
  default = 2
}

variable "memory" {
  type        = string
  default     = "1536M"
}

variable "disk" {
  type    = string
  default = "4G"
}

variable "ssh_public_key_path" {
  type        = string
  default     = "~/.ssh/id_ed25519.pub"
}

variable "ssh_private_key_path" {
  type        = string
  default     = "~/.ssh/id_ed25519"
}
