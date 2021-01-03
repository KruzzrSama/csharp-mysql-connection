using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace denememysql
{
    public class MySQLConnection
    {
        public static string DataConfig = "server=localhost;database=denememysqlcsharp;uid=root;pwd=";
    }
    class Program
    { 
        static void Main(string[] args)
        {
            MySqlConnection con = new MySqlConnection(MySQLConnection.DataConfig);
            con.Open();
            Console.WriteLine("Version: " + con.ServerVersion + "\n");
            // Update işlemi - database de varolan bir veriyi gerçek zamanlı değiştirmek için kullanılır.
            string newusername = "yeniad";
            int id = 1;

            MySqlCommand update = new MySqlCommand("UPDATE deneme_db SET db_username='" + newusername + "' WHERE id='"+ id +"'", con);
            update.ExecuteNonQuery();
            Console.WriteLine("Güncellendi");
            Console.ReadLine();
            // Update işlemi - son
            con.Close();
        }
    }
}
