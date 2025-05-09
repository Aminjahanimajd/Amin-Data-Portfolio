# 📊 Customer Churn Prediction

This machine learning project predicts whether a customer will churn (leave the company) using historical telecom customer data. The goal is to support business decision-making by identifying key churn indicators and suggesting retention strategies.

## 🧠 Objective
To classify customer churn using supervised machine learning algorithms: Logistic Regression, Random Forest, and Support Vector Machine (SVM).

---

## 📁 Dataset

- **Source**: The dataset used is [Telco Customer Churn](https://www.kaggle.com/datasets/blastchar/telco-customer-churn) from Kaggle. It includes customer demographics, services signed up for, account information, and churn labels.
- **Records**: 7,043 customers
- **Features**: 21 columns, including:
  - Categorical: gender, InternetService, Contract, PaymentMethod, etc.
  - Numerical: tenure, MonthlyCharges, TotalCharges
  - Target: `Churn` (Yes/No)

**Sample Output:**

customerID | gender SeniorCitizen ... MonthlyCharges TotalCharges | Churn

0 | 7590-VHVEG Female 0 ... 29.85 29.85 | No

1 | 5575-GNVDE Male 0 ... 56.95 1889.5 | No

2 | 3668-QPYBK Male 0 ... 53.85 108.15 | Yes


---

## ✅ Project Workflow

1. **Data Loading and Inspection**  
   - Loaded CSV and analyzed data structure.
   - Inspected column types and identified nulls.

2. **Data Cleaning**  
   - Converted `TotalCharges` to numeric, dropped rows with missing values.
   - Removed unnecessary columns like `customerID`.

3. **Feature Engineering**  
   - Encoded categorical variables using binary and one-hot encoding.
   - Scaled features using `StandardScaler`.

4. **Model Training**  
   - Trained a **Logistic Regression** classifier.
   - Compared performance with **Random Forest** and **Support Vector Machine (SVM)**.

5. **Evaluation Metrics**  
   - Accuracy, Precision, Recall, Confusion Matrix, and Classification Report were computed.

6. **Feature Importance Visualization**  
   - Visualized top 10 most influential features using a Random Forest classifier.

---

## 🧪 Model Performance Summary

Three models were trained and evaluated:

| Model               | Accuracy | Precision | Recall |
|--------------------|----------|-----------|--------|
| Logistic Regression| 0.7875   | 0.6206    | 0.5160 |
| Random Forest       | 0.7868   | 0.6360    | 0.4626 |
| SVM (Linear Kernel) | 0.7953   | 0.6361    | 0.5374 |

**Confusion Matrices and Classification Reports:**

- **Logistic Regression**
[[915 118]
[181 193]]

           precision    recall  f1-score   support

       0       0.83      0.89      0.86      1033
       1       0.62      0.52      0.56       374

accuracy                           0.79      1407
macro avg 0.73 0.70 0.71 1407
weighted avg 0.78 0.79 0.78 1407

- **Random Forest**
[[934 99]
[201 173]]

           precision    recall  f1-score   support

       0       0.82      0.90      0.86      1033
       1       0.64      0.46      0.54       374

accuracy                           0.79      1407
macro avg 0.73 0.68 0.70 1407
weighted avg 0.77 0.79 0.77 1407

- **SVM**
[[918 115]
[173 201]]

           precision    recall  f1-score   support

       0       0.84      0.89      0.86      1033
       1       0.64      0.54      0.58       374

accuracy                           0.80      1407
macro avg 0.74 0.71 0.72 1407
weighted avg 0.79 0.80 0.79 1407

## 🔍 Business Insights

- Customers with **month-to-month contracts**, **fiber optic internet**, or **no tech support** are more likely to churn.
- Offering longer contracts and bundling support services can reduce churn.
- High churn is seen among users with high monthly charges but low tenure.
  
- **Top Influential Features** (via Random Forest):
  
  - Contract type
  - Tenure
  - Internet service
  - Online security
  - Tech support

---

## 📌 Conclusion & Recommendations

- Logistic Regression offered solid interpretability with a balanced performance.
- Random Forest slightly outperformed other models in accuracy but at the cost of complexity.
- For production use, **Random Forest** is recommended due to its ability to model nonlinear relationships and handle feature interactions.

- **Next Steps** could include:

   - Hyperparameter tuning
  - Using SMOTE for class imbalance
  - Deploying the model as an API

---

## 💾 Output Files

- `feature_importance_plot.png` – Visualizes the top 10 important features from the Random Forest model.

---

## 💻 Requirements

- Python 3.7+
- pandas, numpy, scikit-learn, seaborn, matplotlib

To install dependencies:

pip install -r requirements.txt

📬 Contact

Developed by Amin — 2nd year BSc Data Analysis, University of Messina.
For inquiries, please reach out via GitHub or [Linkdin](https://www.linkedin.com/in/mohammadamin-jahanimajd-481b6033a/).
