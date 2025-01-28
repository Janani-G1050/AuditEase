import os
import json
from http.server import BaseHTTPRequestHandler, HTTPServer
import google.generativeai as genai

class MyHandler(BaseHTTPRequestHandler):  
    def do_POST(self):
        # Get the content length from the headers
        content_length = int(self.headers['Content-Length'])
        post_data = self.rfile.read(content_length)
        
        # Decode the JSON data
        received_data = json.loads(post_data.decode('utf-8'))
        print("Received data from PHP:", received_data)

        # Configure the GenAI API (Replace 'API_KEY' with your actual key)
        genai.configure(api_key="AIzaSyBUafZksvb9vjX02D-Gm1z_iha9b5VwIbk")

        # Create the model
        generation_config = {
          "temperature": 1,
          "top_p": 0.95,
          "top_k": 40,
          "max_output_tokens": 8192,
          "response_mime_type": "text/plain",
        }

        model = genai.GenerativeModel(
          model_name="gemini-1.5-flash",
          generation_config=generation_config,
          system_instruction="hey i am creating a chatbot in ai studio for that i need strong system instructions for Finance managing .Note this is important my bot should answer only question relate to finance related question and also should acts as financial advisors, it should not answer any other questions dont send any chats in system instruction, Give me max 500 words reply in short and sweet",
        )

        chat_session = model.start_chat(
          history=[]
        )

        # Interact with the AI model
        response = chat_session.send_message(received_data["message"])
        print("Generated Response:", response.text)
        
        # Prepare the response JSON
        response_data = {
            "reply": f"{response.text}",
            "Username": "Janani"
        }
        response_json = json.dumps(response_data)
        
        # Send response
        self.send_response(200)
        self.send_header('Content-Type', 'application/json')
        self.end_headers()
        self.wfile.write(response_json.encode('utf-8'))

# Start the server
server_address = ('', 8000)  # Listening on port 8000
httpd = HTTPServer(server_address, MyHandler)
print("Python server is running...")
httpd.serve_forever()