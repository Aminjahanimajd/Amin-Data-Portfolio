# 📊 Sales Data Cleaning and Visualization — Technographic Data (Italy)

## 🔍 Project Overview
This project involves cleaning, transforming, and visualizing a real-world B2B technographic dataset of companies in Italy. The dataset provides insight into technologies used by businesses, including deployment status, digital tools, and IT infrastructure. The goal is to demonstrate core data analysis skills: preprocessing, feature engineering, visualization, and communication of insights.

---

## 🧾 Dataset Description

- **Source:** [Techsalerator - Kaggle](https://www.kaggle.com/datasets/techsalerator/b2b-technographic-data-in-italy)
- **Rows:** 308 records
- **Fields Include:**
  - `Website Domain`
  - `Ticker`
  - `Technology Name`
  - `Deployment Dates`
  - `Behind Firewall Status`
  - `Technology ID`

---

## 🧹 Cleaning & Preprocessing Steps

- Loaded and explored the dataset with `pandas`
- Handled missing values (`Ticker` column)
- Converted date strings into datetime format
- Engineered new features:
  - `Last_Year`, `Last_Month` from `Last Seen At`
- Exported the cleaned dataset to CSV

---

## 📊 Visualizations

Created using `matplotlib` and `seaborn`:

- 📈 **Technology Appearances Over Time**
- 🏆 **Top 10 Technologies**
- 🔐 **Behind Firewall Usage**
- 📅 **Trend of Top Technology by Month**
- 🧱 **Technology Mentions by Company**

---

## 📁 Project Structure

📂 Technographic-Analysis-Italy/ │ ├── ItalyB2B.py # Main script ├── Cleaned_Technographic_Data_Italy.csv ├── plots/ # (Optional) Exported figures ├── README.md # Project documentation

---

## 💡 Key Insights

- A few companies dominate technology usage (e.g., `infosys.com`)
- Some technologies are used repeatedly across months
- Most technologies are behind firewalls, indicating strong security posture
- Deployment spikes in specific periods suggest targeted implementation windows

---

## 📌 Tools & Libraries

- Python 3.10+
- pandas
- seaborn
- matplotlib
- Jupyter Notebook / Spyder (local environment)

---

## 📬 Author

**Mohammadamin Jahanimajd**, Data Analysis BSc Student  
University of Messina  
*Aspiring Machine Learning Engineer*

---

## 🔗 License

Dataset credit: [Techsalerator via Kaggle]
