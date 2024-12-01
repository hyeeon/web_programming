   function check_input()
   {
      if (!document.member_form.pass.value)
      {
          alert("비밀번호를 입력하세요!");    
          document.member_form.pass.focus();
          return;
      }

      // 비밀번호 유효성 검사
      const pass = document.member_form.pass.value;
      const passReg = /^(?=.*[A-Z])(?=.*[!@#$%^&*()_+])(?=.*[a-zA-Z0-9]).{8,}$/;
      if (!passRegex.test(pass)) {
         alert(
            "비밀번호는 8자리 이상, 1개 이상의 대문자, 특수문자를 포함해야 합니다."
         );
         document.member_form.pass.focus();
         return;
      }

      if (!document.member_form.pass_confirm.value)
      {
          alert("비밀번호확인을 입력하세요!");    
          document.member_form.pass_confirm.focus();
          return;
      }

      if (!document.member_form.name.value)
      {
          alert("이름을 입력하세요!");    
          document.member_form.name.focus();
          return;
      }
      // 이름 유효성 검사
      const name = document.member_form.name.value;
      const nameRegex = /^[가-힣a-zA-Z]{2,}$/;
      if (!nameRegex.test(name)) {
         alert("이름은 한글 또는 영어로 2글자 이상 입력하세요!");
         document.member_form.name.focus();
         return;
      }

      if (!document.member_form.email1.value)
      {
          alert("이메일 주소를 입력하세요!");    
          document.member_form.email1.focus();
          return;
      }

      if (!document.member_form.email2.value)
      {
          alert("이메일 주소를 입력하세요!");    
          document.member_form.email2.focus();
          return;
      }
    // 이메일 유효성 검사
    const emailReg = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (!emailReg.test(document.member_form.email1.value + "@" + document.member_form.email2.value)) {
        alert("유효한 이메일 주소를 입력하세요!");
        document.member_form.email1.focus();
        return;
    }

      if (document.member_form.pass.value != 
            document.member_form.pass_confirm.value)
      {
          alert("비밀번호가 일치하지 않습니다.\n다시 입력해 주세요!");
          document.member_form.pass.focus();
          document.member_form.pass.select();
          return;
      }

      document.member_form.submit();
   }

   function reset_form()
   {
      document.member_form.id.value = "";  
      document.member_form.pass.value = "";
      document.member_form.pass_confirm.value = "";
      document.member_form.name.value = "";
      document.member_form.email1.value = "";
      document.member_form.email2.value = "";
	  
      document.member_form.id.focus();

      return;
   }
