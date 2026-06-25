# Caerus Swarm — Multipass + Terraform (Apple Silicon)

Provisions 4 native arm64 Ubuntu VMs with Multipass via Terraform, then configures
the Swarm with the same Ansible playbook as before.

| VM            | role  | services                                   |
|---------------|-------|--------------------------------------------|
| caerus-edge   | edge  | nginx (LB), redis, Prometheus, Grafana     |
| caerus-db     | db    | MySQL                                      |
| caerus-app-1  | app   | php-fpm                                    |
| caerus-app-2  | app   | php-fpm                                    |

Only the provisioning layer changed (Multipass instead of VirtualBox). The
`playbook.yml` and `caerus-stack.yml` are reused as-is.

## Prerequisites
```bash
brew install --cask multipass
ssh-keygen -t ed25519
```

## 1) Create the VMs (Terraform)
```bash
cd terraform-multipass
terraform init
terraform apply -parallelism=1
terraform output
```
<sub>
Images build on ARM
</sub>

## 2) Configure + deploy (Ansible)
```bash
multipass exec caerus-edge -- sudo apt-get install -y python3-jsondiff 

cd ../ansible

ansible-galaxy collection install community.docker
ansible-playbook -i inventory.ini playbook.yml -e caerus_root=/ABS/PATH/TO/Caerus
```

## 3) Open it
- App:        `http://<edge_ip>:8000`
- Grafana:    `http://<edge_ip>:3000`
- Prometheus: `http://<edge_ip>:9090`