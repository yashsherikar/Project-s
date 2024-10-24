#include<stdio.h>
int additon(int Value1,int Value2)
{
	return Value1+Value2;
}
int main()
{
	int no1 = 0,no2 = 0,Ret = 0;
	
	printf("Enter First Number :");
	scanf("%d",&no1);
	
	printf("Enter Second Number :");
	scanf("%d",&no2);
	
	Ret = additon(no1,no2);
	
	printf("The Addition Of Two Number Is : %d",Ret);
	
	return 0;
}