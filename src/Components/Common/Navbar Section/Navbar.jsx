import React, { useEffect, useState } from 'react'
import classes from './Navbar.module.css'
import Logo from '../../../assets/Logo.png'
import Logoblack from '../../../assets/Logoblack.png'

const Navbar = () => {
  
  const [isScrolled, setIsScrolled] = useState(true);

  useEffect(() => {
    const handleScroll = () => {
      const isTop = window.scrollY > 20;
      if (isTop !== isScrolled) {
        setIsScrolled(isTop);
      }
    };
    document.addEventListener("scroll", handleScroll);
    return () => {
      document.removeEventListener("scroll", handleScroll);
    };
  }, [isScrolled]);
  return (
    <div className={`${isScrolled ? classes.navbar_con : classes.navbar_con_before }`}>
        <div className={classes.content}>
            <div className={classes.logo_con}>
              {isScrolled ? 
                <img src={Logoblack} alt='' /> : <img src={Logo} alt='' /> }
             </div>
            <div className={classes.options_con}>
                <p>SERVICES</p>
                <p>PORTFOLIO</p>
                <p>BLOGS</p>
                <p>ABOUT</p>
                <p>CAREERS</p>
                <p style={{marginLeft: '5%'}}>GET IN TOUCH</p>
            </div>
        </div>
    </div>
  )
}

export default Navbar