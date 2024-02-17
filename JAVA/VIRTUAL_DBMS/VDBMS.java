import java.lang.*;
import java.util.*;

class Student
{
    public int RollN;
    public String Name;
	public String Gender;
	public int Age;
    public int FEE;
	public String City;
	public long PhNo;

	private static int Generator;

    static
    {
        Generator = 0;
    }
   

    public Student(String str,String gender,int age,String cstr,long PhoneNo,int value)
    {
        this.RollN = ++Generator;
        this.Name = str;
        this.Gender = gender;
		this.Age = age;
		this.City = cstr;
		this.PhNo = PhoneNo;
        this.FEE = value;
       
    }
   
    public void DisplayData()
    {
        System.out.format("| %3s | %10s | %10s | %3s | %10s | %12s | %10s |",this.RollN,this.Name,this.Gender,this.Age,this.City,this.PhNo,this.FEE );
		System.out.println();
    }
}

class DBMS
{
   public LinkedList <Student> lobj;

    public DBMS()
    {
        lobj = new LinkedList<>();
    }

 
    public void StartDBMS()
    {
        Scanner scanobj = new Scanner(System.in);

        System.out.println("CUSTOMISED VIRTUAL DBMS STARTED SUCCESFULLY......");
        String Query = "";

        while(true)
        {
            System.out.print("CUSTOMISED VIRTUAL DBMS CONSOLE >");
            Query = scanobj.nextLine();

            String tokens[] = Query.split(" ");                  // aplya Query che tukade padaych tokens
            int QuerySize = tokens.length;
			
            if(QuerySize == 1)
            {
				//For commnds info
                if(("Help".equals(tokens[0])) || ("help".equals(tokens[0])))
                {
                    System.out.println("**************THIS APPLICATION IS USED TO DEMONSTRATES THE CUSTOMISED DBMS*********************|");
					System.out.println("|**********************************************************************************************|"); 
					System.out.println("| QUERY                           |                      COMMAND                               |");
					System.out.println("|**********************************************************************************************|");
                    System.out.println("| Exit                           : Terminate DBMS                                              |");
                    System.out.println("| Display all DATA               : select * from student                            	       |");
					System.out.println("| Insert data In Table           : Insert into student STUDENT_NAME Gender Age CITY PhNo FEE   |");
					System.out.println("| Display By NAME                : select * from student where name = name                     |");
					System.out.println("| Display By ROLLNO              : select * from student where rollno = ROLLNO                 |");
					System.out.println("| Display By FEE                 : select * from student where fee = FEE                       |");
					System.out.println("| Display By PHNOEno             : select * from student where phoneno = PhNo                  |");
					System.out.println("| Display By CITY                : select * from student where city = sangli                   |");
					System.out.println("| Display IN City                : select * from student where city in city1 and city2         |");
					System.out.println("| Display Between fee            : select * FROM student where fee between fee1 and fee2       |");
					System.out.println("| Display Between age            : select * FROM student where fee between age1 and age2       |");
					System.out.println("| Display Between roll           : select * FROM student where fee between roll1 and roll2     |");
					System.out.println("| Display And Query              : select * from student where name = Stud_Name and city = City|");
					System.out.println("| Display or Query               : select * from student where name = yash or city = sangli    |");
					System.out.println("| Display By two_city            : select * from student where city in 1st_city and 2nd_city   |");
					System.out.println("| Display GRETER_than_fee        : select * from student where fee > Stud_fee                  |");
					System.out.println("| Display GRETER_than_roll       : select * from student where Roll > Stud_roll                |");
					System.out.println("| Display GRETER_than_age        : select * from student where Roll > Stud_age                 |");
					System.out.println("| Display LESS_then_roll         : select * from student where Roll < Stud_roll                |");
					System.out.println("| Display LESS_than_fee          : select * from student where fee < Stud_fee       	       |");
					System.out.println("| Display LESS_than_age          : select * from student where fee < Stud_age                  |");
					System.out.println("| Display GRETER.Than.equal.roll : select * from student where Roll >= Stud_roll               |");
					System.out.println("| Display GRETER.Than.equal.fee  : select * from student where fee >=  Stud_fee                |");
					System.out.println("| Display LESS.Than.equal.roll   : select * from student where Roll < Stud_roll                |");
					System.out.println("| Display LESS.Than.equal.fee    : select * from student where fee < Stud_fee                  |");
					System.out.println("| Display Not.equal.roll         : select * from student where Roll <> Stud_roll               |");
					System.out.println("| Display Not.equal.fee          : select * from student where fee <> Stud_fee                 |");
					System.out.println("| Delete All data                : Delete  from  student                                       |");
					System.out.println("| Delete table                   : drop table  student                                         |");
					System.out.println("| Delete By NAME                 : delete from student where name = Stud_Name                  |");
					System.out.println("| Delete By ROLLNO               : delete from student where Roll = Stud_rollno                |");
					System.out.println("| Delete By FEE                  : delete from student where fee = Stud_Fee                    |");
					System.out.println("| Delete By PHNOEno              : delete from student where phone = Stud_Phone_no             |");
                   
					
					System.out.println("|**********************************************************************************************|");
                }
				
				//For exit our programm
                else if(("Exit".equals(tokens[0])) || ("exit".equals(tokens[0])))
                {
                    System.out.println("Thank you for using Virtual DBMS");
                    break; 
                }
            }
            else if(QuerySize == 2)
            {

            }
			//Delete all data from in student
			else if(QuerySize == 3)
			{
				if("delete".equals(tokens[0]))
				{
					if("from".equals(tokens[1]))
					{
						if("student".equals(tokens[2]))
						{
							DeleteAllData();
						}
					}
				}
				else if("drop".equals(tokens[0]))
				{
					if("table".equals(tokens[1]))
					{
						System.out.println("Table Drop succesfully....");
					}
				}
			}
			//select * from student
            else if(QuerySize == 4)
            {
                if("select".equals(tokens[0]))
                {
                    if("*".equals(tokens[1]))
                    {
						if("from".equals(tokens[2]))
						{	
							if("student".equals(tokens[3]))
							{
								DisplayAll();
							}
							else
							{
								System.out.println("Error : Table Name Invalid");
							}
							
						}
						else
						{
							System.out.println("Error :  Please check 3 word '" +tokens[2]+ "' Did You Mean 'from'");
						}
					}
					else
					{
						System.out.println("Error : Please check 2 word '" +tokens[1]+"'  Did You Mean '*'");
					}
                }
				else
				{
					System.out.println("Error : Please check 1 word '"+tokens[0]+"' Did You Mean 'select'");
				}
            }
			
			// Insert into student  yash male 20 sangli 8698011606 1000 ;
            else if(QuerySize == 9)
            {
               
                if("Insert".equals(tokens[0]))
                {
					if("into".equals(tokens[1]))
					{	
						if("student".equals(tokens[2]))
						{	
							System.out.println("Inster data succesfully");
							InsertData(tokens[3],tokens[4],Integer.parseInt(tokens[5]),tokens[6],Long.parseLong(tokens[7]),Integer.parseInt(tokens[8]));
						}
						else
						{
							System.out.println("Error : Please check 3 word '" +tokens[2]+"'  Did You Mean 'student'");
						}
					}	
					else
					{
						System.out.println("Error : Please check 2 word '" +tokens[1]+"'  Did You Mean 'into'");
					}
				}
				else
				{
					System.out.println("Error : Please check 1 word '" +tokens[0]+"'  Did You Mean 'Insert'");
				}
            }
			
			///Delete specific
			else if(QuerySize == 7)
			{
				if("delete".equals(tokens[0]))                                         
				{
					if("from".equals(tokens[1]))
					{
						if("student".equals(tokens[2]))
						{
							if("where".equals(tokens[3]))                        
							{
								if("name".equals(tokens[4]))                           //delete from student where name = Stud_Name
								{
									DeleteSpecific((tokens[6]));									
								}	
								else if("Roll".equals(tokens[4]))                     //delete from student where Roll = 2
								{
									DeleteSpecific(Integer.parseInt(tokens[6]));
								}
								else if("fee".equals(tokens[4]))                          //delete from student where fee = 2000
								{
									DeleteSpecific1(Integer.parseInt(tokens[6]));
								}
								else if("city".equals(tokens[4]))                          //delete from student where city = sangli
								{
									DeleteSpecific1((tokens[6]));
								}
								else if("phone".equals(tokens[4]))                          //delete from student where phone = 86980111606
								{
									DeleteSpecific2(Long.parseLong(tokens[6]));
								}
									
							}	
							else
							{
								System.out.println("Error : Please check 4 word '" +tokens[3]+"'  Did You Mean 'where'");
							}						
						}
						else
						{
							System.out.println("Error : Please check 3 word '" +tokens[2]+"'  Did You Mean 'student'");
						}
					}
					else
					{
						System.out.println("Error : Please check 2 word '" +tokens[1]+"'  Did You Mean 'from'");
					}
				}
				else
				{
					System.out.println("Error : Please check 1 word '" +tokens[0]+"'  Did You Mean 'delete'");
				}
			}
		  	
	
			//Display by specific
			else if(QuerySize == 8)
			{
				if("select".equals(tokens[0]))                                  //  select * from student where name = yash 
				{
					if("*".equals(tokens[1]))
					{
						if("from".equals(tokens[2]))
						{
							if("student".equals(tokens[3]))                        
							{
								if("where".equals(tokens[4]))
								{
									if("=".equals(tokens[6]))
									{
										if("name".equals(tokens[5]))
										{
											DisplaySpecific((tokens[7]));									
										}
										else if("Roll".equals(tokens[5]))                     //select * from student where Roll = 2
										{
											DisplaySpecific(Integer.parseInt(tokens[7]));
										}
										else if("fee".equals(tokens[5]))                         //select * from student where fee = 20000
										{
											DisplaySpecific1(Integer.parseInt(tokens[7]));
										}
										else if("city".equals(tokens[5]))                          //select * from student where city = sangli
										{
											DisplaySpecific1((tokens[7]));
										}
										else if("phone".equals(tokens[5]))                          //select * from student where phone = 8698011606
										{
											DisplaySpecific2(Long.parseLong(tokens[7]));
										}
										else if("gender".equals(tokens[5]))                          //select * from student where gender = male
										{
											DisplaySpecific2((tokens[7]));
										}
									
									}
									else if("like".equals(tokens[6]))								 //select * from student where name like y
									{
										if("name".equals(tokens[5]))
										{
											Displayby_latter((tokens[7]));
										}
									}
						
									else if(">".equals(tokens[6]))
									{
										if("Roll".equals(tokens[5]))                    		 //select * from student where Roll > 2
										{
											DisplayGreterthan(Integer.parseInt(tokens[7]));
										}
										else if("fee".equals(tokens[5]))                         //select * from student where fee >20000
										{
											DisplayGreterthan1(Integer.parseInt(tokens[7]));
										}
										else if("age".equals(tokens[5]))                         //select * from student where fee >20000
										{
											DisplayGreterthan2(Integer.parseInt(tokens[7]));
										}
									}
									else if("<".equals(tokens[6]))
									{
										if("Roll".equals(tokens[5]))                    		 //select * from student where Roll < 2
										{
											DisplayLessthen(Integer.parseInt(tokens[7]));
										}
										else if("fee".equals(tokens[5]))                         //select * from student where fee > 20000
										{
											DisplayLessthen1(Integer.parseInt(tokens[7]));
										}	
										else if("age".equals(tokens[5]))                         //select * from student where fee > 20000
										{
											DisplayLessthen2(Integer.parseInt(tokens[7]));
										}
									}
									else if(">=".equals(tokens[6]))
									{
										if("Roll".equals(tokens[5]))                    		 //select * from student where Roll >= 2
										{
											DisplayGreterthanEqual(Integer.parseInt(tokens[7]));
										}
										else if("fee".equals(tokens[5]))                         //select * from student where fee >=20000
										{
											DisplayGreterthanEqual1(Integer.parseInt(tokens[7]));
										}
									}
									else if("<=".equals(tokens[6]))
									{
										if("Roll".equals(tokens[5]))                    		 //select * from student where Roll <= 2
										{
											DisplayLessthenEqual(Integer.parseInt(tokens[7]));
										}
										else if("fee".equals(tokens[5]))                         //select * from student where fee <= 20000
										{
											DisplayLessthenEqual1(Integer.parseInt(tokens[7]));
										}
									}
									else if("<>".equals(tokens[6]))
									{
										if("Roll".equals(tokens[5]))                    		 //select * from student where Roll <> 2
										{
											DisplayNotEqual(Integer.parseInt(tokens[7]));
										}
										else if("fee".equals(tokens[5]))                         //select * from student where fee <> 20000
										{
											DisplayNotEqual1(Integer.parseInt(tokens[7]));
										}
									}
								}   
								else
								{
									System.out.println("Error : Please check 5 word '" +tokens[4]+"'  Did You Mean 'where'");
								}								
							}	
							else
							{
								System.out.println("Error : Please check 4 word '" +tokens[3]+"'  Did You Mean 'student'");
							}							
						}
						else
						{
							System.out.println("Error : Please check 3 word '" +tokens[2]+"'  Did You Mean 'from'");
						}
					}
					else
					{
						System.out.println("Error : Please check 2 word '" +tokens[1]+"'  Did You Mean '*'");
					}
				}
				else
				{
					System.out.println("Error : Please check 1 word '" +tokens[0]+"'  Did You Mean 'select'");
				}
			}
			//select * from student where fee BETWEEN 5000 AND 20000;   //select * from student where city in sangli and kholhapur	
			else if(QuerySize == 10)
			{
				if("select".equals(tokens[0]))                                
				{																 		
					if("*".equals(tokens[1]))
					{
						if("from".equals(tokens[2]))
						{
							if("student".equals(tokens[3]))                        
							{
								if("where".equals(tokens[4]))
								{
									if("between".equals(tokens[6]))
									{
										if("and".equals(tokens[8]))
										{
											if("fee".equals(tokens[5]))
											{
												DisplayBetween(Integer.parseInt(tokens[7]),Integer.parseInt(tokens[9]));
											}
											else if("age".equals(tokens[5]))
											{
												DisplayBetween1(Integer.parseInt(tokens[7]),Integer.parseInt(tokens[9]));
											}
											else if("roll".equals(tokens[5]))
											{
												DisplayBetween2(Integer.parseInt(tokens[7]),Integer.parseInt(tokens[9]));
											}
											
										}
									}
									else if("city".equals(tokens[5]))          //select * from student where city in sangli and kholhapur			
									{
										if("in".equals(tokens[6]))
										{                               
											if("and".equals(tokens[8]))
											{											
												Displayby_City((tokens[7]),(tokens[9]));
											}
										}
									}
									else if("fee".equals(tokens[5]))          //select * from student where fee in 2000 and 5000			
									{
										if("in".equals(tokens[6]))
										{                               
											if("and".equals(tokens[8]))
											{											
												Displayby_fee(Integer.parseInt(tokens[7]),Integer.parseInt(tokens[9]));
											}
										}
									}
									else if("age".equals(tokens[5]))          //select * from student where age in 20 and 30			
									{
										if("in".equals(tokens[6]))
										{                               
											if("and".equals(tokens[8]))
											{											
												Displayby_age(Integer.parseInt(tokens[7]),Integer.parseInt(tokens[9]));
											}
										}
									}
								}
							}
						}
					}
				}		
			}
			//select * from student where name = yash and city = sangli      //select * from student where name = yash or city = sangli
			else if(QuerySize == 12)
			{
				if("select".equals(tokens[0]))                                
				{																 		
					if("*".equals(tokens[1]))
					{
						if("from".equals(tokens[2]))
						{
							if("student".equals(tokens[3]))                        
							{
								if("where".equals(tokens[4]))
								{
									if("=".equals(tokens[6]))
									{
										if("and".equals(tokens[8]))
										{
											if("=".equals(tokens[10]))
											{
												if("name".equals(tokens[5]))
												{
													if("city".equals(tokens[9]))
													{
														DisplayNAndC((tokens[7]),(tokens[11]));
													}
												}
												else if("city".equals(tokens[5]))
												{
													if("city".equals(tokens[9]))
													{
														DisplayCAndC((tokens[7]),(tokens[11]));
													}
												}
												else if("roll".equals(tokens[5]))
												{
													if("city".equals(tokens[9]))
													{
														DisplayRAndC(Integer.parseInt(tokens[7]),(tokens[11]));
													}
												}
												else if("name".equals(tokens[5]))
												{
													if("gender".equals(tokens[9]))
													{
														DisplayNAndG((tokens[7]),(tokens[11]));
													}
												}
												
											}
											else
											{
												System.out.println("Error : Please check 11 word '" +tokens[10]+"'  Did You Mean '='");
											}	
										}
										else if("or".equals(tokens[8]))
										{
											if("=".equals(tokens[10]))
											{
												if("name".equals(tokens[5]))
												{
													if("city".equals(tokens[9]))
													{
														DisplayNorC((tokens[7]),(tokens[11]));
													}
												}
												else if("roll".equals(tokens[5]))
												{
													if("city".equals(tokens[9]))
													{
														DisplayRorC(Integer.parseInt(tokens[7]),(tokens[11]));
													}
												}
												else if("name".equals(tokens[5]))
												{
													if("gender".equals(tokens[9]))
													{
														DisplayNorG((tokens[7]),(tokens[11]));
													}
												}
												
											}
										}
									}
									else
									{
										System.out.println("Error : Please check 7 word '" +tokens[6]+"'  Did You Mean '='");
									}	
								}
								else
								{
									System.out.println("Error : Please check 5 word '" +tokens[4]+"'  Did You Mean 'where'");
								}	
							}
							else
							{
								System.out.println("Error : Please check 4 word '" +tokens[3]+"'  Did You Mean 'student'");
							}	
						}
						else
						{
							System.out.println("Error : Please check 3 word '" +tokens[2]+"'  Did You Mean 'from'");
						}
					}
					else
					{
						System.out.println("Error : Please check 2 word '" +tokens[1]+"'  Did You Mean '*'");
					}
				}
				else 
				{
					System.out.println("Error : Please check 1 word '" +tokens[0]+"'  Did You Mean 'select'");
				}
			}
			
		}  	
	}

    // Insert into query
    public void InsertData(String str, String gender,int age,String cstr,long PhoneNo, int value)
    {
        Student sobj = new Student(str,gender,age,cstr,PhoneNo,value);
		lobj.add(sobj);
    }
	
	

    // Display all without condition
    public void DisplayAll()
    {
        for(Student sref : lobj)
        {
            sref.DisplayData();
        }
    }
	//Display name and city
	public void DisplayNAndC(String str,String str2)
    {
        for(Student sref : lobj)
        {
            if((str.equals(sref.Name)) && (str2.equals(sref.City)))
            {
                sref.DisplayData();
            }
        }
    }	
	//Display name and city
	public void DisplayCAndC(String str,String str2)
    {
        for(Student sref : lobj)
        {
            if((str.equals(sref.City)) && (str2.equals(sref.City)))
            {
                sref.DisplayData();
            }
        }
    }
	//Display name and gender
	public void DisplayNAndG(String str,String str2)
    {
        for(Student sref : lobj)
        {
            if((str.equals(sref.Name)) && (str2.equals(sref.Gender)))
            {
                sref.DisplayData();
            }
        }
    }
	//Display roll and city
	public void DisplayRAndC(int roll,String str)
    {
        for(Student sref : lobj)
        {
            if((roll ==(sref.RollN)) && (str.equals(sref.City)))
            {
                sref.DisplayData();
            }
        }
    }
	//Display name or city
	public void DisplayNorC(String str,String str2)
    {
        for(Student sref : lobj)
        {
            if((str.equals(sref.Name)) || (str2.equals(sref.City)))
            {
                sref.DisplayData();
            }
        }
    }
	//Display name or gender
	public void DisplayNorG(String str,String str2)
    {
        for(Student sref : lobj)
        {
            if((str.equals(sref.Name)) || (str2.equals(sref.Gender)))
            {
                sref.DisplayData();
            }
        }
    }
	//Display roll or city
	public void DisplayRorC(int roll,String str)
    {
        for(Student sref : lobj)
        {
            if((roll == (sref.RollN)) || (str.equals(sref.City)))
            {
                sref.DisplayData();
            }
        }
    }
	//Display notequal to roll
	public void DisplayNotEqual(int roll)
    {
         for(Student sref : lobj)
        {
            if(sref.RollN != roll)
            {
                sref.DisplayData();
                
            }
        }
    }
	//Display by notequal to  fee
	public void DisplayNotEqual1(int fee)
    {
         for(Student sref : lobj)
        {
            if(sref.FEE != fee)
            {
                sref.DisplayData();
                
            }
        }
	}
	//Display between the fee
	public void DisplayBetween(int fee,int fee2)
    {
         for(Student sref : lobj)
        {
            if((sref.FEE >= fee) && (sref.FEE <= fee2))
            {
				
                sref.DisplayData();
                
            }
        }
    }
	
	//Display between the age
	public void DisplayBetween1(int age,int age2)
    {
         for(Student sref : lobj)
        {
            if((sref.Age >= age) && (sref.Age <= age2))
            {
				
                sref.DisplayData();
                
            }
        }
    }
	//Display between the roll
	public void DisplayBetween2(int roll,int roll2)
    {
         for(Student sref : lobj)
        {
            if((sref.RollN >= roll) && (sref.RollN <= roll2))
            {
				
                sref.DisplayData();
                
            }
        }
    }
	
	

	

    // Display by Roll Number
    public void DisplaySpecific(int roll)
    {
         for(Student sref : lobj)
        {
            if(sref.RollN == roll)
            {
                sref.DisplayData();
                break;
            }
        }
    }
	 // Display by Phone_Number
    public void DisplaySpecific2(long phoneno)
    {
         for(Student sref : lobj)
        {
            if(sref.PhNo == phoneno)
            {
                sref.DisplayData();
                break;
            }
        }
    }
	
	
	//Display by fee
	public void DisplaySpecific1(int fee)
    {
         for(Student sref : lobj)
        {
            if(sref.FEE == fee)
            {
                sref.DisplayData();
                
            }
        }
    }

    // Display by name
	public void DisplaySpecific(String str)
    {
        for(Student sref : lobj)
        {
            if(str.equals(sref.Name))
            {
                sref.DisplayData();
            }
        }
    }
	
	
	//Display by cityes
	public void Displayby_City(String str,String str1)
    {
        for(Student sref : lobj)
        {
			if(str.equals(sref.City))
			{
				sref.DisplayData();
			}
			else if(str1.equals(sref.City))
			{
				sref.DisplayData();
			}
		}
   }
   //Display by fee's
   public void Displayby_fee(int fee , int fee1)
    {
         for(Student sref : lobj)
        {
            if(sref.FEE == fee)
            {
                sref.DisplayData();
                
            } 
			else if(sref.FEE == fee1)
            {
                sref.DisplayData();
                
            }
			
        }
    }  
	//Display by age's
   public void Displayby_age(int age , int age1)
    {
         for(Student sref : lobj)
        {
            if(sref.Age == age)
            {
                sref.DisplayData();
                
            } 
			else if(sref.Age == age1)
            {
                sref.DisplayData();
                
            }
			
        }
    }
	
	//Display by word num 2
/*	public void Displayby_Word1(String str)
    {
         for(Student sref : lobj)
        {
			if(str.equals(sref.City))
			{
				sref.DisplayData();
			}
		}
    }*/
	//////Display by word
	public void Displayby_latter(String str)
    {
        
		for(Student sref : lobj)
        {
			String word = sref.Name;
			String[] alphabets = word.split("");
			for(String alphabet : alphabets) 
			{ 
				if(str.equals(alphabet))
				{
					sref.DisplayData();
				}
			}
		}
    }
	
	//Display by City
	 public void DisplaySpecific1(String cstr)
    {
         for(Student sref : lobj)
        {
            if(cstr.equals(sref.City))
            {
                sref.DisplayData();
            }
        }
    }
	
	//Display by Gender
	 public void DisplaySpecific2(String Gen)
    {
         for(Student sref : lobj)
        {
            if(Gen.equals(sref.Gender))
            {
                sref.DisplayData();
            }
        }
    }

	//Display greter then rollno
	public void DisplayGreterthan(int roll)
    {
         for(Student sref : lobj)
        {
            if(sref.RollN > roll)
            {
                sref.DisplayData();
                
            }
        }
    }
	
	//Display by gretern than fee
	public void DisplayGreterthan1(int fee)
    {
         for(Student sref : lobj)
        {
            if(sref.FEE > fee)
            {
                sref.DisplayData();
                
            }
        }
    }	
	
	//Display by gretern than age
	public void DisplayGreterthan2(int age)
    {
         for(Student sref : lobj)
        {
            if(sref.Age > age)
            {
                sref.DisplayData();
                
            }
        }
    }
	//Display greterthen equal rollno
	public void DisplayGreterthanEqual(int roll)
    {
         for(Student sref : lobj)
        {
            if(sref.RollN >= roll)
            {
                sref.DisplayData();
                
            }
        }
    }
	//Display greterthen equal fee
	public void DisplayGreterthanEqual1(int fee)
    {
        for(Student sref : lobj)
        {
            if(sref.FEE >= fee)
            {
                sref.DisplayData();
                
            }
        }
    }
	
	
	//Display lessthen rollno
	public void DisplayLessthen(int roll)
    {
         for(Student sref : lobj)
        {
            if(sref.RollN < roll)
            {
                sref.DisplayData();
                
            }
        }
    }
	
	
	//Display by less than fee
	public void DisplayLessthen1(int fee)
    {
         for(Student sref : lobj)
        {
            if(sref.FEE < fee)
            {
                sref.DisplayData();
                
            }
        }
    }
	
	//Display by less than fee
	public void DisplayLessthen2(int age)
    {
         for(Student sref : lobj)
        {
            if(sref.Age < age)
            {
                sref.DisplayData();
                
            }
        }
    }
	
	
	//Display lessthan equal rollno
	public void DisplayLessthenEqual(int roll)
    {
         for(Student sref : lobj)
        {
            if(sref.RollN <= roll)
            {
                sref.DisplayData();
                
            }
        }
    }
	//Display lessthan equal fee
	public void DisplayLessthenEqual1(int fee)
    {
        for(Student sref : lobj)
        {
            if(sref.FEE <= fee)
            {
                sref.DisplayData();
                
            }
        }
    }
	//Delete All Data from student
	public void DeleteAllData()
	{
        
        for(Student sref : lobj)
        {
            lobj.clear();
			System.out.println("All data Deleted succesfully...");
        }
    }

    // Delete by Roll Number
    public void DeleteSpecific(int roll)
    {
        int index = 0;

        for(Student sref : lobj)
        {
            if(sref.RollN == roll)
            {
                lobj.remove(index);
                break;
            }
            index++;
        }
		
    }
	
	//Delete by Phone_Number
	public void DeleteSpecific2(long phoneno)
    {
        int index = 0;

        for(Student sref : lobj)
        {
            if(sref.PhNo == phoneno)
            {
                lobj.remove(index);
                break;
            }
            index++;
        }
    }
	//Delete by fee
	public void DeleteSpecific1(int fee)
    {
        int index = 0;

        for(Student sref : lobj)
        {
            if(sref.FEE == fee)
            {
                lobj.remove(index);
               
            }
            index++;
        }
    }

    // Delete by Name
    public void DeleteSpecific(String str)
    {
        int index = 0;

        for(Student sref : lobj)
        {
            if(str.equals(sref.Name))
            {
                lobj.remove(index);
                break;
            }
            index++;
        }
		System.out.println("Deleted Sucssefully...");
    }
	
	//Delete by city
	public void DeleteSpecific1(String cstr)
    {
		int index = 0;

         for(Student sref : lobj)
        {
            if(cstr.equals(sref.City))
            {
                lobj.remove(index);
            }
			index++;
        }
    }

    public void AggregateMax()
    {
        int iMax = 0;
        Student temp = null;

        for(Student sref : lobj)
        {
            if(sref.FEE > iMax)
            {
                iMax = sref.FEE;
                temp = sref;
            }
        }

        System.out.println("Information of student having maximum FEE : ");
        temp.DisplayData();
    }

    public void AggregateMin()
    {
        int iMin = (lobj.getFirst()).FEE;
        Student temp = lobj.getFirst();

        for(Student sref : lobj)
        {
            if(sref.FEE < iMin)
            {
                iMin = sref.FEE;
                temp = sref;
            }
        }

        System.out.println("Information of student having minimum FEE : ");
        temp.DisplayData();
    }

    public void AggregateSum()
    {
        long iSum = 0;

        for(Student sref : lobj)
        {
            iSum = iSum + sref.FEE;
        }

        System.out.println("Summation of Fee is : "+ iSum);
    }

    public void AggregateAvg()
    {
        long iSum = 0;

        for(Student sref : lobj)
        {
            iSum = iSum + sref.FEE;
        }

        System.out.println("Average FEE is : "+ iSum / (lobj.size()));
    }

    public void AggregateCount()
    {
         System.out.println("Count is : "+lobj.size());
    }
}

class VDBMS
{
    public static void main(String arg[])
    {
        DBMS dobj = new DBMS();

        dobj.StartDBMS();

      
       

    }
}