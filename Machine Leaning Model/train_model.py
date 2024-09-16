import pandas as pd
from sklearn.linear_model import LinearRegression
from sklearn.model_selection import train_test_split
import joblib

# Sample data with historical prices and market factors (replace with your data)
data = pd.read_csv('historical_prices.csv')  # Replace with actual data source
X = data[['market_factor1', 'market_factor2']]  # Replace with actual features
y = data['price']

# Split the data into training and testing sets
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)

# Train a simple linear regression model
model = LinearRegression()
model.fit(X_train, y_train)

# Save the trained model to a file
joblib.dump(model, 'price_prediction_model.pkl')
