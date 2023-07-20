using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace RestApiWithBlazort.Models
{
    public record Person(string Name);

    public class Student {
        [Key]
        public int Id { get; set; }
        public string FirstName { get; set; } = string.Empty;
        public string MiddleName { get; set; } = null!;
        public string LastName { get; set; } = null!;
        public string FullName => $"{FirstName} {MiddleName} {LastName}";
        public string Email { get; set; } = null!;
        public string PhoneNumber { get; set; }
        public string Gender { get; set; } = null!;
        
    }
}
