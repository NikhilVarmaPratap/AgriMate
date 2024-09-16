from flask import Flask, request, jsonify
import joblib
import numpy as np

app = Flask(__name__)

# Load the trained model
model = joblib.load('price_prediction_model.pkl')

@app.route('/predict', methods=['POST'])
def predict():
    # Get data from the request
    data = request.json
    features = np.array([data['market_factor1'], data['market_factor2']]).reshape(1, -1)
    
    # Make prediction
    prediction = model.predict(features)
    
    return jsonify({'predicted_price': prediction[0]})

if __name__ == '__main__':
    app.run(debug=True, host='0.0.0.0', port=5000)
