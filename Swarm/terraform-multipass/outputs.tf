output "edge_ip" {
  description = "Edge / manager. App: http://<ip>:8000  Grafana: :3000  Prometheus: :9090"
  value       = multipass_instance.node["caerus-edge"].ipv4[0]
}

output "db_ip" {
  value = multipass_instance.node["caerus-db"].ipv4[0]
}

output "app_ips" {
  value = [for n in ["caerus-app-1", "caerus-app-2"] : multipass_instance.node[n].ipv4[0]]
}
