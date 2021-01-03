## Giriş
C# mysql select, insert ve update işlermleri

- ##### Select işlemi

```csharp
public static string DataConfig = "server=localhost;database=denememysqlcsharp;uid=root;pwd=";

MySqlConnection con = new MySqlConnection(MySQLConnection.DataConfig);

con.Open();
Console.WriteLine("Version: " + con.ServerVersion + "\n");
// Select işlemi - database deki bir veriyi çekmek için kullanılır.
MySqlCommand select = new MySqlCommand("SELECT * FROM deneme_db ORDER BY id ASC", con);
int Count = Convert.ToInt32(select.ExecuteScalar());
if (Count != 0)
{
	MySqlDataReader dr = select.ExecuteReader();
	while (dr.Read())
	{
		Console.WriteLine("Username: " + dr["db_username"] + "\nPassword: "+ dr["db_password"] +"\nPerm: " + dr["db_perm"] + "\n");
	}
}
con.Close();
Console.ReadLine();
```
