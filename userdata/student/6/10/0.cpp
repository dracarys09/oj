#include<bits/stdc++.h>

using namespace std;

int main(){
  int t,n;
  bool flag = true;
  cin >> t;
  while(t--){
    flag = true;
    cin >> n;
    for(int i = 2;i*i<=n;++i){
      if(n%i == 0){
        flag = false;
        break;
      }
    }
    if(flag){
      cout << "YES" << endl;
    }
    else{
      cout << "NO" << endl;
    }
  }
  return 0;
}
