using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using Microsoft.EntityFrameworkCore;
using RestApiWithBlazort.Models;

namespace RestApiWithBlazort.Context
{
    public class ApplicationDBContext : DbContext
    { 
        public ApplicationDBContext(DbContextOptions<ApplicationDBContext> options) : base(options)
        {

        }

        public DbSet<Student> Students { get; set; }
    }


}
