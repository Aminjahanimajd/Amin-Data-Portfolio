import os
import pandas as pd

# Ensure the folder exists
os.makedirs("plots", exist_ok=True)

# Define the file path
file_path = "C:/Users/SefroyeK/OneDrive/Desktop/ItalyB2B/TechnographicData.csv"

# Load the CSV into a DataFrame
df = pd.read_csv(file_path)

# Display first 5 rows
print("🔹 First 5 rows:")
print(df.head())

# Display data structure and types
print("\n🔹 Dataset Info:")
print(df.info())

# Describe numerical columns (if any)
print("\n🔹 Statistical Summary (Numerical Columns):")
print(df.describe())

# Option: Fill missing ticker values with "Unknown"
df['Ticker'] = df['Ticker'].fillna("Unknown")

# Confirm changes
print("🔍 Missing values after fill:")
print(df.isnull().sum())

# Convert to datetime format
df['First Seen At'] = pd.to_datetime(df['First Seen At'], errors='coerce')
df['Last Seen At'] = pd.to_datetime(df['Last Seen At'], errors='coerce')

# Confirm conversion
print("✅ Data types after conversion:")
print(df.dtypes)

# Create year and month columns from 'First Seen At'
df['First_Year'] = df['First Seen At'].dt.year
df['First_Month'] = df['First Seen At'].dt.month

# Create year and month columns from 'Last Seen At'
df['Last_Year'] = df['Last Seen At'].dt.year
df['Last_Month'] = df['Last Seen At'].dt.month

# Preview changes
print(df[['First Seen At', 'First_Year', 'First_Month', 'Last Seen At', 'Last_Year', 'Last_Month']].head())

# Total records by Last_Year and Last_Month
monthly_counts = df.groupby(['Last_Year', 'Last_Month']).size().reset_index(name='Installations')
print("🔹 Installations per month:")
print(monthly_counts.head())

# Top 10 most common technologies
top_techs = df['Technology Name'].value_counts().head(10)
print("\n🔹 Top 10 Technologies:")
print(top_techs)

# Technology presence behind firewall
firewall_distribution = df.groupby('Behind Firewall')['Technology Name'].count()
print("\n🔹 Technologies Behind Firewall Distribution:")
print(firewall_distribution)

# Recent technologies seen in last month (assuming dataset goes up to September 2024)
latest_month = df['Last Seen At'].max().month
latest_year = df['Last Seen At'].max().year
recent_techs = df[(df['Last_Year'] == latest_year) & (df['Last_Month'] == latest_month)]
print(f"\n🔹 Technologies seen in {latest_month}/{latest_year}:")
print(recent_techs['Technology Name'].value_counts().head())

import matplotlib.pyplot as plt
import seaborn as sns

# Optional: for better visuals
sns.set(style='whitegrid')
plt.rcParams['figure.figsize'] = (10, 6)

# Plot 1: Technology Appearances Over Time
monthly_counts = df.groupby(['Last_Year', 'Last_Month']).size().reset_index(name='Installations')
monthly_counts['Date'] = pd.to_datetime({
    'year': monthly_counts['Last_Year'],
    'month': monthly_counts['Last_Month'],
    'day': 1
})

sns.lineplot(data=monthly_counts, x='Date', y='Installations', marker='o')
plt.title("📈 Technology Appearances Over Time")
plt.xlabel("Date")
plt.ylabel("Number of Appearances")
plt.xticks(rotation=45)
plt.tight_layout()
plt.savefig("plots/tech_mentions_over_time.png")
plt.show()
plt.close()

# Plot 2: Top 10 Technologies
top_techs = df['Technology Name'].value_counts().head(10)

sns.barplot(x=top_techs.values, y=top_techs.index, palette="viridis")
plt.title("🏆 Top 10 Most Used Technologies")
plt.xlabel("Frequency")
plt.ylabel("Technology Name")
plt.tight_layout()
plt.savefig("plots/top_10_technologies.png")
plt.show()
plt.close()

# Plot 3: Behind Firewall Distribution
sns.countplot(data=df, x='Behind Firewall', palette='Set2')
plt.title("🔐 Technologies Behind Firewall")
plt.xlabel("Behind Firewall")
plt.ylabel("Count")
plt.tight_layout()
plt.savefig("plots/behind_firewall_distribution.png")
plt.show()
plt.close()

# Plot 4: Trend of Most Common Technology
top_tech_name = top_techs.index[0]
top_tech_df = df[df['Technology Name'] == top_tech_name]

trend = top_tech_df.groupby(['Last_Year', 'Last_Month']).size().reset_index(name='Count')
trend['Date'] = pd.to_datetime({
    'year': trend['Last_Year'],
    'month': trend['Last_Month'],
    'day': 1
})

sns.lineplot(data=trend, x='Date', y='Count', marker='o')
plt.title(f"📈 Trend for {top_tech_name} Over Time")
plt.xlabel("Date")
plt.ylabel("Mentions")
plt.xticks(rotation=45)
plt.tight_layout()
plt.savefig("plots/trend_top_technology.png")
plt.show()
plt.close()

# Plot 5: Technology Mentions by Company
top_domains = df['Website Domain'].value_counts().head(8).index
filtered = df[df['Website Domain'].isin(top_domains)]

sns.countplot(data=filtered, y='Website Domain', order=top_domains, palette="coolwarm")
plt.title("🧱 Technology Mentions by Company (Top 8)")
plt.xlabel("Count")
plt.ylabel("Website Domain")
plt.tight_layout()
plt.savefig("plots/top_companies.png")
plt.show()
plt.close()

# Define file path to save
output_path = "Cleaned_Technographic_Data_Italy.csv"

# Save DataFrame to CSV
df.to_csv(output_path, index=False)

print(f"✅ Cleaned dataset successfully saved to: {output_path}")
