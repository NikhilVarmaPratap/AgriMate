namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PricePredictionController extends Controller
{
    public function showPredictionForm()
    {
        return view('predictions.form');
    }

    public function getPrediction(Request $request)
    {
        $validated = $request->validate([
            'market_factor1' => 'required|numeric',
            'market_factor2' => 'required|numeric',
        ]);

        // Call the Flask API to get the predicted price
        $response = Http::post('http://localhost:5000/predict', $validated);

        if ($response->successful()) {
            $predictedPrice = $response->json()['predicted_price'];

            return back()->with('predictedPrice', $predictedPrice);
        } else {
            return back()->withErrors('Failed to get prediction from the model.');
        }
    }
}
