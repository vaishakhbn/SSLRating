#include<stdio.h>
#include<unistd.h>
#include<signal.h>
#include<string.h>
#include<stdlib.h>
main()
{
	pid_t pid,pid2,pid3;
	FILE *fp;
	char* string_result;
	int  size_total,i=0,j=0; 
	char c,ch;
	char st1[] = "openssl s_client -showcerts -connect ";
	char st3[] = ":443 >certificate.txt";
	char st2[20];
	char st[200];
	//char *st;
	fp=fopen("input.txt","r");
	//printf("%s",argv[1]);
	while((ch=fgetc(fp))!=EOF)
	{
		st2[i]=ch;
		i++;
	}
fclose(fp);
	st2[i]='\0';
//	printf("st2 is %s",st2);
	//fclose(fp);

	if((pid=fork())<0)
		perror("V's Fork Error: ");
	if (pid==0)
	{
		strcpy(st,st1);
		strcat(st,st2);
		
  		//strcat(st,st3);
		//strcat(st1,st2);
		printf("..................................%s",st);
		system(st);
		//sleep(3);
	}
	else {
		pid2=fork();
		if(pid2==0)
		{
		printf("AHAHAHAHHA");
		sleep(2);
		system("openssl x509 -in certificate.txt -noout -text >check.txt");
		printf("I'm here");


	//	exit(0);
		
	        }
		else
		{
			sleep(2);
			system("pkill openssl");
		
		//sleep(2);
		char st4[] = "openssl s_client -connect ";
		//char st5[] = ":443 >check2.txt";
		char st6[20];
		char st7[200];
		 i=0;
		//char *st;
		fp=fopen("input1.txt","r");
		//printf("%s",argv[1]);
		printf("Hello.................................");
		while((ch=fgetc(fp))!=EOF)
		{
			st6[j]=ch;
			j++;
		}
		st6[j]='\0'; printf("%s",st6);
//	printf("st2 is %s",st2);
		fclose(fp);	
		sleep(3);
		strcpy(st7,st4);
		strcat(st7,st6);
		
  		//strcat(st,st4);
		//strcat(st1,st2);
		printf("..................................%s",st7);
		system(st7);	


	/*	system("openssl s_client -connect google.com:443 >check2.txt");
		strcpy(st,st1);
		strcat(st,st2);
		
  		//strcat(st,st3);
		//strcat(st1,st2);
		printf("..................................%s",st);
		system(st);

                 pid_t pid2;
                 if((pid2=fork())==0)
			{
				char st4[] = "openssl s_client -connect ";
	//char st5[] = ":443 >check2.txt";
	char st6[20];
	char st7[200];
	//char *st;
	fp=fopen("input.txt","r");
	//printf("%s",argv[1]);
	while((ch=fgetc(fp))!=EOF)
	{
		st6[i]=ch;
		i++;
	}
	st6[i]='\0';
//	printf("st2 is %s",st2);
	fclose(fp);	
		sleep(3);
		strcpy(st7,st4);
		strcat(st7,st6);
		
  		//strcat(st,st4);
		//strcat(st1,st2);
		printf("..................................%s",st);
		system(st7);		
		//system();
	//	system("openssl x509 -noout -in test.cert -issuer >./issuer.txt");
}
	}
	else
	{
	//system("openssl x509 -noout -in test.cert -issuer >issuer.txt");
	//system("openssl x509 -noout -in test.cert -dates >date.txt");
	char st4[] = "openssl s_client -connect ";
	//char st5[] = ":443 >check2.txt";
	char st6[20];
	char st7[200];
	//char *st;
	fp=fopen("input.txt","r");
	//printf("%s",argv[1]);
	while((ch=fgetc(fp))!=EOF)
	{
		st6[i]=ch;
		i++;
	}
	st6[i]='\0';
//	printf("st2 is %s",st2);
	fclose(fp);	
		sleep(3);
		strcpy(st7,st4);
		strcat(st7,st6);
		
  		//strcat(st,st4);
		//strcat(st1,st2);
		printf("..................................%s",st);
		system(st7);		
		//system();
	//	system("openssl x509 -noout -in test.cert -issuer >./issuer.txt");*/
//}
	}
}
}
