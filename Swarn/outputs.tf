output "edge_ip" {
  description = "Edge / manager. App: http://<ip>:8000  Grafana: :3000  Prometheus: :9090"
  value       = virtualbox_vm.node[0].network_adapter[1].ipv4_address
}

output "db_ip" {
  description = "Database node"
  value       = virtualbox_vm.node[1].network_adapter[1].ipv4_address
}

output "app_ips" {
  description = "Application nodes"
  value       = [for i, vm in virtualbox_vm.node : vm.network_adapter[1].ipv4_address if i >= 2]
}
